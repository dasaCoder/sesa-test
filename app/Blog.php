<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function comments(){
        return $this->morphMany('App\Comments','commentable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }
}
