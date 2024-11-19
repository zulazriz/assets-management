<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'initiate_user_id',
        'subject',
        'status',
    ];

    public function initiate_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'initiate_user_id', 'id');
    }

    public function lines(): HasMany
    {
        return $this->hasMany(SupportLine::class, 'support_id', 'id');
    }
}
