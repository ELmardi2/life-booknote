<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

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
     //relation between user table and video stories table 
     public function videos()
     {
         return $this->hasMany('App\Video');
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
    public function registerMediaCollections()
    {
        //you can define as much collections as needed
        $this->addMediaCollection('avatar');
        
    }
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }
}
