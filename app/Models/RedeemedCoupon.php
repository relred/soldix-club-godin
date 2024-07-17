<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedeemedCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'coupon_id',
        'cashier',
        'session',
        'transaction_data',
        'brand',
    ];

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }
}
