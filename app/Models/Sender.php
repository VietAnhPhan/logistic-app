<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sender extends Authenticatable
{
    //
    protected $table = 'senders';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
