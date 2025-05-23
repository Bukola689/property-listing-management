<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('address')->required();
            $table->string('city')->required();
            $table->string('zip_code')->required();
            $table->integer('phone_number')->required();
            $table->string('logo_path')->required();
            $table->timestamps();

            $table->unique(['name', 'zip_code', 'phone_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brokers');
    }
}
