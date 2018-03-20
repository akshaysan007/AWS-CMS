<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->date('dob');
            $table->string('email')->unique()->nullale();
            $table->string('street1');
            $table->string('street2')->nullable();
            $table->string('city');
            $table->string('pincode');
            $table->string('phone')->unique();
            $table->string('state');
            $table->string('country');
            $table->string('gst_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('acc_no')->nullable();
            $table->string('ifsc_code')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
