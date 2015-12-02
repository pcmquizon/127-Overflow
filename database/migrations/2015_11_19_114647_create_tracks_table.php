<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string('path')->nullable(); 
            //$table->string('status')->default('pending');
            //$table->string('approverId')->nullable;
            $table->integer('times_played_total')->default(0); 
            //$table->bigInteger('albumId')->nullable();
            $table->timestamps();
        });
    }

/*
    id BIGSERIAL PRIMARY KEY,
    name varchar NOT NULL,
    timesPlayedTotal BIGINTEGER,
    //assumption of uploading mp3 files only, so just store src path + path storage in lalavel

    CreatedBy  BIGINTEGER references user(id),
*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tracks');
    }
}
