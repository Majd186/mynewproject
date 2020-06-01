<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name','address'
    ];

    public function doctor(){
        return $this->hasMany('App\Doctor','hospital_id','id');
    }
}
