<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_expenditures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->date('edate')->nullable();
            $table->string('expenditure')->nullable();
            $table->decimal('cost', 13, 2)->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('vehicle_expenditures');
    }
}
