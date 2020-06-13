<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RentsTable extends Migration
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
            $table->foreignId('movie_id')->constrained('movies')->unique()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->unique()->onDelete('cascade');
            $table->string('status');
            $table->date('rentDate');
            $table->date('returnDate');
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

    }
}
