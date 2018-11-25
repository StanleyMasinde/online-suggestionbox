<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all the suggestions made by the current user
     * 
     * 
     */
    public function suggestions()
    {
        return $this->hasMany('App\Suggestion');
    }

    /**
     * Get the roles for the current user
     * 
     * 
     */
    public function roles()
    {
        return $this->hasOne('App\Role');
    }
}
