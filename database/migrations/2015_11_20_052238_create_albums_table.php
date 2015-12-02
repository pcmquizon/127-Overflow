<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            //$table->text('art');
            //$table->integer('trackTotal')->default(0); 
            $table->string('recording_company')->nullable();
            $table->date('year_released')->nullable();
            $table->timestamps();
        });
    }

/*
    id BIGSERIAL PRIMARY KEY,
    name varchar,
    albumArt text,
    trackTotal int,
    recordingCompany varchar,
    yearReleased int(4) check (yearReleased>0 AND yearReleased<=2015)
*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('albums');
    }
}
