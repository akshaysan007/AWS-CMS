<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Vehicle extends Model
{

	use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'vehicles.vehicle_no' => 10,
            'vehicles.make' => 10,
            'vehicles.model' => 2,
        ],
    ];


    public function expenditure(){

        return $this->hasMany('App\VehicleExpenditure');
    }

    public function rides(){

        return $this->hasMany('App\Ride');
    }

}
