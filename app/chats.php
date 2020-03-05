<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chats extends Model
{
   	public function chats()
   	{
    	return $this->hasMany('App\messages','chat_ID');
    }

    public function friends()
    {
        return $this->belongsTo('App\friends','friend_ID','id');
    }
}
