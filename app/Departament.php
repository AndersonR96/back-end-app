<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $fillable = [
        'departament',  
    ];

    protected $primaryKey = 'departament_id';
}
