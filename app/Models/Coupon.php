<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'type',
        'tag',
        'image',
        'validity',
        'campain_starts',
        'campain_finishes',
        'active',
        'target',
        'parameters',
        'wallet_id',
    ];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
