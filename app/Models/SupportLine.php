<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_user_id',
        'support_id',
        'message',
        'attachments',
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d h:m:s',
        'updated_at' => 'date:Y-m-d h:m:s',
    ];

    public function getAttachmentsAttribute($value)
    {
        return explode(',', $value);
    }
}
