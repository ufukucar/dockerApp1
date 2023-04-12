<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'categroyId',
        'name',
        'slug',
    ];

    public function products()
    {
        return $this->hasMany(Category::class, 'categoryId', 'id');
    }
}
