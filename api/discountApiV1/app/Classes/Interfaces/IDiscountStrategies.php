<?php

namespace App\Classes\Interfaces;

interface IDiscountOrder
{
    public function calculateDiscount(string $order): array;
}
