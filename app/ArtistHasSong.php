<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ArtistHasSong extends Eloquent
{
    /*
	 * @var string
     */

    protected $table = 'artist_has_songs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['artist_id','track_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
