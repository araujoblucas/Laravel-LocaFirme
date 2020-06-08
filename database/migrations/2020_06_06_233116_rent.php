<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function ($table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->unique();
            $table->foreignId('user_id')->constrained('users')->unique();
            $table->integer('active');
            $table->integer('rented');
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
        //
    }
}
