<?php

namespace App\Services\Back\Orders;

use App\Classes\ProjectBaseClass;

use App\Http\Resources\Back\Orders\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Enums\OrderStatusEnum;

class OrderService extends ProjectBaseClass
{

    public function getOrderedItems()
    {
        $customerId = Auth::user()->id;

        $orders = Order::select('id', 'order_number', 'customerId', 'total', 'status')->get();

        return OrderResource::collection($orders);

    }



}
