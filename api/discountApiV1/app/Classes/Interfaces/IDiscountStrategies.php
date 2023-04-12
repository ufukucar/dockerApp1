<?php

namespace App\Classes\Interfaces;

interface IDiscountStrategies
{
    public function calculateDiscount(string $order, float $total);
}
