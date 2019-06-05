<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('white')->unsigned();
            $table->bigInteger('black')->unsigned()->nullable();
            $table->string('winner')->default("-");
            $table->string('format');
            $table->timestamps();
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreign('white')->references('id')->on('users');
            $table->foreign('black')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
