<?php

namespace App\Classes\Discounts\fromInterface;

use App\Classes\Interfaces\IDiscountStrategies;

class DiscountContext
{

    protected  $strategies = [];
    protected $resultArr = [];


    public function setDiscountType(IDiscountStrategies $strategy)
    {
        $this->strategies[] = $strategy;
    }


    public function calculateDiscountForOrder( $order, $total)
    {
        $i = 0;
        foreach ($this->strategies as $strategy ) {

            $arr = [];
            if ( count($this->resultArr) <= 0 ) {
                $calculatedResult = $strategy->calculateDiscount($order, $total);
            }else {

                $calculatedResult = $strategy->calculateDiscount($order, ($this->resultArr[$i-1]['subtotal']));
            }

            $this->resultArr [] =  [
                "data" => $calculatedResult,
                'subtotal' => $this->getTotalSubForArray($calculatedResult)
            ];

            $i++;

        }

        return $this->resultArr;
    }


    private function getTotalSubForArray( $calculatedResult ) {
        //dd(count($calculatedResult));
        //dd($calculatedResult[0]["subtotal"]);
        $initialSubTotal = 0;

        foreach ($calculatedResult as $item) {
            $initialSubTotal += (float) $item["subtotal"];
        }

        return $initialSubTotal;
    }


}
