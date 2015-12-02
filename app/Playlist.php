<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Playlist extends Eloquent
{
   	/*
	 * @var string
     */

    protected $table = 'playlists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','creator_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
