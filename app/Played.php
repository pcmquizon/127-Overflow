<?php

namespace App;

use Illuminate\Database\Eloquent\Model as  Eloquent;
;

class Played extends Eloquent
{
   	/*
	 * @var string
     */

    protected $table = 'played';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['song_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
