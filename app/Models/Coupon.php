<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable =[
        'redeem_id',
        'name',
        'description',
        'type',
        'tag',
        'image',
        'validity',
        'campain_starts',
        'campain_finishes',
        'is_active',
        'importance',
        'target',
        'parameters',
        'wallet_id',
        'is_valid_monday',
        'is_valid_tuesday',
        'is_valid_wednesday',
        'is_valid_thursday',
        'is_valid_friday',
        'is_valid_saturday',
        'is_valid_sunday',
    ];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
