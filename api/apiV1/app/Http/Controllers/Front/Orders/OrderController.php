<?php

namespace App\Http\Controllers\Front\Orders;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Orders\OrderRequestRule;
use App\Http\Resources\Front\Orders\OrderResource;
use App\Models\Order;
use App\Services\Front\Orders\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $req)
    {
        $orders = $this->orderService->getOrderedItems();

        return $orders;
    }


    public function store(OrderRequestRule $request)
    {
        $validatedData = $request->validated();

        if ( empty($validatedData) ) return $this->apiErrorResponse('Bir sorun oluştu');

        return  $this->orderService->store($validatedData["data"]);
    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(Request $req)
    {
        $orderNumber = htmlspecialchars(strip_tags(trim($req->orderNumber)));

        return $this->orderService->cancelOrder($orderNumber);

    }
}
