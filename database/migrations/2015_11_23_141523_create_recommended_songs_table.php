<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendedSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended_songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('song_id');
            $table->foreign('song_id')->references('id')->on('tracks')->onDelete('cascade');;

            $table->bigInteger('recommender_id');
            $table->foreign('recommender_id')->references('id')->on('users')->onDelete('cascade');;

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
        Schema::drop('recommended_songs');
    }
}
