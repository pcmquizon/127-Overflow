<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');       
            $table->timestamps();
        });
    }

/*
    id BIGSERIAL PRIMARY KEY,
    name varchar NOT NULL,
    trackTotal int,

    createdBy  BIGINTEGER references user(id)
*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('playlists');
    }
}
