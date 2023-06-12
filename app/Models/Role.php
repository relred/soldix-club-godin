<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public const IS_USER = 1;

    public const IS_CASHIER = 2;

    public const IS_CORPORATE = 3;

    public const IS_ADMIN = 4;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
