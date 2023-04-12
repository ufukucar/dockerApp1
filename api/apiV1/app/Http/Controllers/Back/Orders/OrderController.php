<?php

namespace App\Http\Controllers\Back\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Back\Orders\OrderService;
use Illuminate\Http\Request;

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


    public function destroy(string $id)
    {
        //
    }
}
