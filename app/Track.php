<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Track extends Eloquent
{
    /*
     * @var string
     */

    protected $table = 'tracks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','creator_id','path'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
