<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Album extends Eloquent
{
    /*
	 * @var string
     */

    protected $table = 'albums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','year_released', 'recording_company'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    
}
