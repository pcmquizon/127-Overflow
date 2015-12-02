<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AlbumsHasArtist extends Eloquent
{
    /*
	 * @var string
     */

    protected $table = 'albums_has_artist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['album_id','artist_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
