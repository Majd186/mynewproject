<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'code', 'number', 'user_id',
    ];

    protected $hidden = [
        'user_id'
    ];

    ############ Start Relations ############

    public function user(){

        return $this->belongsTo('App\User','user_id');
    }    

    ############ End Relations ############
}
