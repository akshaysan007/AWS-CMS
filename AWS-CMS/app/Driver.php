<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Driver extends Model
{


	use SearchableTrait;

	protected $dates = ['dob'];


    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'drivers.f_name' => 10,
            'drivers.l_name' => 10,
            'drivers.m_name' => 2,
        ],
    ];

    public function rides(){

        return $this->hasMany('App\Ride');
    }

}
