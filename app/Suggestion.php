<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    /**
     * The collumns to be filled in the table
     * 
     */
    protected $fillable = [
       'user_id', 'college', 'school', 'title', 'suggestion'
    ];

    /**
     * A suggestion can have many likes
     * 
     * 
     */
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    /**
     * A suggestion an have many comments
     * 
     * 
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * A suggestion can have one response
     * 
     * 
     */
    public function response()
    {
        return $this->hasOne('App\Response');
    }

    /**
     * A suggestion belongs to a user
     * 
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
