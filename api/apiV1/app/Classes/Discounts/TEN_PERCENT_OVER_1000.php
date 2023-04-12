<?php

namespace App\Classes\Discounts;

use App\Classes\Abstracts\DiscountAbstract;

class TEN_PERCENT_OVER_1000 extends DiscountAbstract
{

 /*  public function __construct($order)
   {
       parent::__construct($order);
   }*/

    function calculateDiscount($order)
    {
        if ( $order->total >= 1000 ) {
            return [
                'discountReason' => "10_PERCENT_OVER_1000",
                'discountAmount' =>  number_format((float) ($order->total * 0.1), 2),
                'subtotal' => $order->total - ($order->total * 0.1),
            ];
        }
    }
}
