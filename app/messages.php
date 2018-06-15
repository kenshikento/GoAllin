<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
	protected $fillable = ['status', 'user_ID', 'chat_ID','content'];
	public function chat()
   
    {
        return $this->belongsTo('App\chats','chat_ID','id');

    }

    public function user()
    {
        return $this->belongsTo('App\user','user_ID','id');

    }
    public function postContent(){

    }
    
    
}
