<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = [
        'customerId',
        'order_number',
        'total',
        'date',
        'status',

    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function ordered_items()
    {
        return $this->hasMany(OrderedItem::class, 'orderId', 'id');
    }

}
