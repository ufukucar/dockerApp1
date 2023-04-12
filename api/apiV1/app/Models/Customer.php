<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use Notifiable, HasApiTokens, HasFactory;
    protected $table = "customers";

    protected $fillable = [
        'name',
        'surname',
        'password',
        'email',
        'phone',
        'address',
        'since',
        'revenue'
    ];

    protected $hidden = [
        'password',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
