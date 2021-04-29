<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{

    public function users(){
        return $this->hasMany('App\User')
    }
    protected $fillable = [
        'departament',  
    ];

    protected $primaryKey = 'departament_id';
}
