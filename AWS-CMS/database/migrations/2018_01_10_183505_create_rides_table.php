<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ride_no')->unique();
            $table->string('vehicle_id');
            $table->string('customer_id');
            $table->string('driver_id');
            $table->string('price_km');
            $table->string('price_hr');
            $table->string('source');
            $table->string('destination');
            $table->string('status');
            $table->datetime('from');
            $table->datetime('till');
            $table->string('km_run')->nullable();
            $table->string('hr_run')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
