<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class WoningWaarde extends Model
{
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($woningWaarde) {
            $woningWaarde->user_id = Auth::id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
