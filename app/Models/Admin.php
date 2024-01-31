<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    use HasFactory;
    protected $guard = 'admin';

    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "email",
        "phone",
        "password",
        "role_id",
        "status",
    ];

    protected $hidden = [
        'password',

    ];
}
