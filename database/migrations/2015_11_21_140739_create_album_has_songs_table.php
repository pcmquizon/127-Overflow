<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumHasSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_has_songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');;

            $table->bigInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');;
                        
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
        Schema::drop('album_has_songs');
    }
}
