<?php

namespace App\Http\Controllers\Discounts;

use App\Classes\Abstracts\DiscountAbstract;
use App\Classes\Discounts\Buy_5_Get_1;
use App\Classes\Discounts\En_ucuz_yuzde_yirmi;
use App\Classes\Discounts\TEN_PERCENT_OVER_1000;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    private $discountsArr = [];

    public function calculateDiscount(Request $req)
    {
        $orderNumber = htmlspecialchars(strip_tags(trim($req->orderNumber)));

        if ( !$orderNumber ) return $this->apiErrorResponse('Böyle bir sipariş bulunmuyor!');

        $order = Order::where('order_number', $orderNumber)->first();


        $discountObj1 = new TEN_PERCENT_OVER_1000();
        $discountObj2 = new Buy_5_Get_1();
        $discountObj3 = new En_ucuz_yuzde_yirmi();



        $discounts = $discountObj1->calculateDiscount($order);
        $discounts2 = $discountObj2->calculateDiscount($order);
        $discounts3 = $discountObj3->calculateDiscount($order);


        $discountsArr = collect([$discounts,$discounts2,$discounts3])->filter()->values();

        return $this->apiResponse([
            'orderId' => $order->id,
            'discounts' => $discountsArr,
            'totalDiscount' => '',
            'discountedTotal' => ''
        ], 'İndirimler Listelendi');



    }

    public function calculateDiscount2(Request $req)
    {

    }

}
