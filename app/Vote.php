<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'suggestion_id', 'user_d', 'vote'
    ];
}
