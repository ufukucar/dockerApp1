<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    protected $fillable = [
        'categoryId',
        'name',
        'price',
        'stock'
    ];


    public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->belongsTo(Category::class);
    }


}
