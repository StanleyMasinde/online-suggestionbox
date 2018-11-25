<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * fillables
     * 
     */
    protected $fillable = [
        'user_id', 'name'
    ];
}
