<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $guarded = ['id'];


    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
    
}
