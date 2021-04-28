<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'departament_id',
        'name',
        'last_name',
        'identification_number',
        'email'
    ];

    protected $primaryKey = 'user_id';
}
