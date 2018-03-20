<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Customer extends Model
{
    //

	use SearchableTrait;

    protected $dates = ['dob'];



    protected $searchable = [
        'columns' => [
            'customers.f_name' => 10,
            'customers.l_name' => 10,
            'customers.m_name' => 2,
        ],
    ];

    public function rides(){

        return $this->hasMany('App\Ride');
    }

}
