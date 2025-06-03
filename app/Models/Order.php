<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'customer_name',
        'customer_phone',
        'customer_address',
        'items',
        'subtotal',
        'tax',
        'discount',
        'total',
        'status',
        'promo_code'
    ];

    protected $casts = [
        'items' => 'array'
    ];

    public function generateOrderCode()
    {
        return 'RB' . date('Ymd') . str_pad($this->id ?? rand(1000, 9999), 4, '0', STR_PAD_LEFT);
    }
}
