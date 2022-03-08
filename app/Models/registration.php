<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'city',
        'country',
        'status',
    ];
}
