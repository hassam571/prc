<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // Optionally, add fillable properties
    protected $fillable = [
        'username',
        'email',
        'password',
        'status'
    ];

 



    
}