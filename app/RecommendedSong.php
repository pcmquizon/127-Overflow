<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class RecommendedSong extends Eloquent
{
    /*
	 * @var string
     */

    protected $table = 'recommended_songs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['song_id','recommender_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
