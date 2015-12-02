<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PlaylistHasSong extends Eloquent
{
    /*
	 * @var string
     */

    protected $table = 'playlist_has_songs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['playlist_id', 'track_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
