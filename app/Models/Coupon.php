<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code', 'type', 'value', 'min_order', 'max_uses', 'used_count', 'expires_at', 'is_active'
    ];

    public function isValidFor(float $subtotal): bool
    {
        if (!$this->is_active) return false;
        if ($this->expires_at && now()->isAfter($this->expires_at)) return false;
        if ($this->max_uses && $this->used_count >= $this->max_uses) return false;
        if ($subtotal < $this->min_order) return false;
        return true;
    }

    public function calculateDiscount(float $subtotal): float
    {
        if ($this->type === 'percent') {
            return round(($subtotal * $this->value) / 100, 2);
        }
        return min((float) $this->value, $subtotal);
    }
}
