<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
     * data to be filled
     * 
     */
    protected $fillable = [
        'suggestion_id', 'response'
    ];

    /**
     * Get all suggestions with responses
     * 
     */
    public function suggestions()
    {
        return $this->hasMany('App\Suggestion');
    }
}
