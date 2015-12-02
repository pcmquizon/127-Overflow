<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsHasArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_has_artist', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');;

            $table->bigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');;            
            
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
        Schema::drop('albums_has_artist');
    }
}
