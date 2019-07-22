<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable=['email','event_id','sent_at','accepted_at','rejected_at'];
    public function event(){
        return $this->belongsTo('App\Event');
    }
}
