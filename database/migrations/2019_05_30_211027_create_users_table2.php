<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable2	 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('password');
			$table->string('country')->nullable()->default(null);
            $table->integer('ranking')->default(1500);
            $table->integer('wins')->default(0);
            $table->integer('loses')->default(0);
            $table->integer('draws')->default(0);
            $table->string('bio')->nullable()->default(null);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('users');
    }
}
