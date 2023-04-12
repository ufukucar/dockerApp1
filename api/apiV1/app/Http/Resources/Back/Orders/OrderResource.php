<?php

namespace App\Http\Resources\Front\Orders;

use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $items = OrderedItem::where('orderId', $this->id)->get(['productId', 'quantity', 'unitPrice', 'total']);

        return [
            'productId' => $this->id,
            'customerId' => $this->customerId,
            'items' => $items,
            'total' => $this->total,
            'status' => $this->status->name,
        ];
    }

    public function with($request){
        return [
            'Sonuc'=> 'Veriler başarıyla getirildi',
        ];
    }
}
