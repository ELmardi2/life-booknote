<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relation between user table and stories table 
    public function stories()
    {
        return $this->hasMany('App\Story');
    }
    //relation between user table and articles table 
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
    //relation between user table and notes table 
    public function notes()
    {
        return $this->hasMany('App\Note');
    }
}
