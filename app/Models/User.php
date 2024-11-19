<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\FileHelper;
use App\Helpers\UserHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_image',
        'name',
        'email',
        'password',
        'role',
        'user_disabled_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getProfileImageAttribute($value)
    {
        if ($value) {
            return FileHelper::getUrlFile($value);
        } else {
            return UserHelper::getDefaultProfileImage();
        }
    }

    public function getCurrentCompanyAttribute()
    {
        if ($this->role == 'company_admin') {
            return $this->company;
        }
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'admin_user_id', 'id');
    }
}
