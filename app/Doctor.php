<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name','title','hospital_id','gender'
    ];
    protected $hidden = ['created_at','updated_at','pivot'];

    public function hospital(){
        return $this->belongsTo('App\Hospital','hospital_id','id');
    }

    public function services(){
        return $this->belongsToMany('App\Service','doctor_service','doctor_id','service_id','id','id');
    }
}
