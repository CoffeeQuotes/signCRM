<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';
    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "lead_group_id",
        "admin_id",
    ];
}
