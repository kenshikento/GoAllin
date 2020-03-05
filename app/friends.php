<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friends extends Model
{
    protected $fillable = ['user_ID', 'friendID', 'status'];

    public function user()
    {
        return $this->belongsTo('App\user','user_ID','id');
    }

    public function friends()
    {
        return $this->hasOne('app\chats','friend_ID');
    }
}
