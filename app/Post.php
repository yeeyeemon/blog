<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body','slug','user_id','viewer_count'];

    public function category(){
        return $this->belongsTo('App\Post');
    }

    public function page(){
        return $this->belongsTo('App\Page');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
