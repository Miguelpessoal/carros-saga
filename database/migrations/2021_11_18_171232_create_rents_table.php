<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->datetime('rent_data');
            $table->datetime('devolution_data');
            $table->decimal('value');
            $table->bigInteger('km_traveled');
            $table->bigInteger('km_finish');
            $table->boolean('finished');
            $table->string('description');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
