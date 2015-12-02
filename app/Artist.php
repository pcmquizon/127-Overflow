<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Artist extends Eloquent
{
	/*
	 * @var string
     */

    protected $table = 'artists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','biography'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    //
}
