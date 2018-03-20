<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    //
    protected $dates = ['from','till'];


    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}
