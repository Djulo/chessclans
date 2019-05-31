<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
			$table->string('message',255)->nullable;
			$table->bigInteger('idReporter')->unsigned();
			$table->bigInteger('idReported')->unsigned();
			$table->foreign('idReporter')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('idReported')->references('id')->on('users')->onDelete('cascade');
			$table->rememberToken();
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
        Schema::dropIfExists('report');
    }
}
