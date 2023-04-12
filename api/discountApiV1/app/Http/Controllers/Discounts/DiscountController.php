<?php

namespace App\Http\Controllers\Discounts;


use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Services\Discounts\DiscountService;
use App\Models\Order;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    private $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    // Bir sipariş teslim ya da iptal edilmediği sürece indirimi hesaplanabilir.
    public function calculateDiscount(Request $req)
    {

        $orderNumber = htmlspecialchars(strip_tags(trim($req->orderNumber)));

        if ( !$orderNumber ) return $this->apiErrorResponse('Böyle bir sipariş bulunmuyor!');

        $order = Order::where('order_number', $orderNumber)
            ->whereNotIn('status', [OrderStatusEnum::CANCELLED->value, OrderStatusEnum::DELIVERED->value])
            ->first();

        if ( !$order ) return $this->apiErrorResponse('Böyle bir sipariş bulunmuyor!!');

        return $this->discountService->calculateDiscount($order);


    }

}
