<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    use HasFactory;

    protected $table = "ordered_items";

    protected $fillable = [
        'orderId',
        'productId',
        'quantity',
        'unitPrice',
        'total'
    ];


    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }



}
