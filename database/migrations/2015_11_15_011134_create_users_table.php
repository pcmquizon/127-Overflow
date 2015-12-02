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
            //$table->increments('id');
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->date('date_approved')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('role');
            $table->string('status');
            $table->string('profile_picture_path')->nullable();
            $table->bigInteger('approver_id')->nullable();
            $table->foreign('approver_id')->references('id')->on('users');
            $table->timestamps();
            $table->rememberToken();
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
