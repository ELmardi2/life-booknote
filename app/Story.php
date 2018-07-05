<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'title', 'detail', 'status', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
