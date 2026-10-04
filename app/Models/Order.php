<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'order_number', 'status', 'subtotal', 'discount',
        'shipping', 'tax', 'total', 'coupon_code', 'payment_method',
        'payment_status', 'razorpay_order_id', 'razorpay_payment_id',
        'ship_name', 'ship_phone', 'ship_address', 'ship_city',
        'ship_state', 'ship_pincode', 'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
