<?php

namespace App\Services\Front\Orders;

use App\Classes\ProjectBaseClass;
use App\Http\Resources\Front\Orders\OrderResource;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Enums\OrderStatusEnum;
use function Sodium\increment;

class OrderService extends ProjectBaseClass
{

    public function getOrderedItems()
    {
        $customerId = Auth::user()->id;

        $order = Order::select('id', 'customerId', 'total', 'status')->where('customerId', Auth::user()->id)->get();

        return OrderResource::collection($order);

    }


    public function store($data)
    {

        DB::beginTransaction();

        try {
            // Sipariş numarası oluşturuldu.
            $uniqueSiparisId = uniqid();

            // Sipariş oluşturuluyor.
            $order = Order::create([
                'customerId' => Auth::user()->id,
                'order_number' => $uniqueSiparisId,
                'status' => OrderStatusEnum::PENDING->value
            ]);


            foreach ($data as $d ) {

                $product = $this->getOrderDetail($d);

                if ( !$product ) return $this->apiErrorResponse("Ürün bulunamadı");

                if ( !$this->checkProductStock($product, $d["quantity"]) )
                    return $this->apiErrorResponse("'$product->name' adlı üründe yeterli stok bulunmamaktadır.");

                /*** Sipariş verilen ürünler db ye kaydediliyor */
                $create_ordered_product = OrderedItem::create([
                    'orderId' => $order->id,
                    'productId' => $product->id,
                    'quantity' => $d["quantity"],
                    'unitPrice' => $product->unitPrice,
                    'total' => (float) $product->unitPrice * $d["quantity"],
                ]);

                if ( $create_ordered_product ) {
                    /** Stok değeri güncelleniyor */
                    $product->stock -= $d["quantity"];
                    $product->save();

                    /** Sipariş Total i güncelleniyor */
                    $order->total += (float) $product->unitPrice * $d["quantity"];
                    $order->save();
                }
            }

            DB::commit();

        }catch (\Exception $e) {
            DB::rollBack();

            //return $this->apiErrorResponse("Bir sorun oluştu, Siparişinizi alamadık. Daha sonra tekrar deneyin :(");
            return $this->apiErrorResponse($e->getMessage());
        }

        return $this->apiResponse("Siparişiniz aldık, Sipariş numaranız:  $uniqueSiparisId ");

    }


    public function cancelOrder($orderNumber) {

        $order = $this->orderCheck($orderNumber);

        if ( !$order ) return $this->apiErrorResponse("Böyle bir sipariş bulunmamaktadır.");

        try {

            DB::beginTransaction();

            try {
                $order->status = OrderStatusEnum::CANCELLED->value ;
                // $order->delete();
                $order->save();


                $orderedItems = OrderedItem::where('orderId', $order->id)->get();

                // Ürün stokları güncelleniyor..
                foreach ($orderedItems as $item) {
                    Product::where('id', $item->productId)->increment('stock', $item->quantity);
                }

                DB::commit();

            }catch (\Exception $e) {
                DB::rollBack();
                return $this->apiErrorResponse($e->getMessage());
            }


            return $this->apiResponse("", "$orderNumber numaralı siparişiniz iptal edilmiştir.");
        }catch (\Exception $e) {
            return $this->apiErrorResponse($e->getMessage());
        }

    }

    private function getOrderDetail($data)
    {
        return Product::where('id', $data["productId"])->first() ?? false;
    }

    private function checkProductStock($product, $quantity)
    {
        return $product->stock >= $quantity;
    }

    // Daha önceden iptal edilmiş ya da teslim edilmiş sipariş iptal edilemez.
    private function orderCheck($orderNumber) {
        return Order::where('order_number', $orderNumber)->where('customerId', Auth::user()->id)
            ->whereNot('status', OrderStatusEnum::CANCELLED->value)
            ->whereNot('status', OrderStatusEnum::DELIVERED->value)
            ->first() ?? false;
    }
}
