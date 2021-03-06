<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('img');
            $table->string('alias');
            $table->string('email')->unique();
			$table->string('city');
			$table->string('country');
			$table->string('website');
            $table->string('bio');
			$table->string('experience');
            $table->string('url');
            $table->string('code');
            $table->string('job');
            $table->string('phone');
            $table->string('passcode');
			$table->boolean('active');
			$table->boolean('activated');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
