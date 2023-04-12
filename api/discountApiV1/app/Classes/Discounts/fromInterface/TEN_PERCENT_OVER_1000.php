<?php

namespace App\Classes\Discounts\fromInterface;

use App\Classes\Interfaces\IDiscountStrategies;

class TEN_PERCENT_OVER_1000 implements IDiscountStrategies
{

    private $discounts = [];

    function calculateDiscount($order, $total)
    {

        if ( $order->total >= 1000 ) {

            // %10 indirim
            $discountAmount =  number_format( ($order->total * 0.1), 2, );



            $this->discounts []= [
                'discountReason' => "10_PERCENT_OVER_1000",
                'discountAmount' =>   $discountAmount,
                //'subtotal' => (float) $total - $discountAmount,
                'subtotal' => number_format(((float) $total) - $discountAmount, 2, ',', '')

            ];
            return $this->discounts;


        }
    }
}
