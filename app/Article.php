<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'details', 'user_id'
    ];

    //relationship between user and his articles
    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
}
