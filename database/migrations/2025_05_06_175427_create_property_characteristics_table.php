<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_characteristic', function (Blueprint $table) {
            $table->unsignedBigInteger('prperty_id')->unique();
            $table->float('price')->required();
            $table->integer('bedroooms')->required();
            $table->integer('bathrooms')->required();
            $table->float('sqft')->required();
            $table->float('price_sqft')->required();
            $table->enum('property_type')->required();
            $table->enum('status')->required();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_characteristic');
    }
}
