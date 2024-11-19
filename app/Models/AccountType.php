<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AccountType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group',
    ];

    static function formatByGroup(Collection $account_types)
    {
        return $account_types->groupBy('group');
    }
}
