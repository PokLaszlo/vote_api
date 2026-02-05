<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasRole;
use App\Services\AbilityService;

class User extends Authenticatable
{
     use HasApiTokens, Notifiable, HasRole;

    protected $fillable = [
        'name',
        'email',
        'password',
        'ownership_ratio',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'ownership_ratio' => 'float',
    ];

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }

    public function meetings()
    {
        return $this->hasMany(Meeting::class, 'created_by');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
