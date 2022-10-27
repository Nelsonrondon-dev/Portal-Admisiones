<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ends', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('curriculum');
            $table->string('name_1')->nullable();
            $table->string('lasname_1')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('alumno_eadic_1')->nullable();

            $table->string('name_2')->nullable();
            $table->string('lasname_2')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('alumno_eadic_2')->nullable();


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
        Schema::dropIfExists('ends');
    }
}
