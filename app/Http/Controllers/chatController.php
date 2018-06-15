<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use App\chats;
use App\friends;
use Auth;
use DB;


class chatController extends Controller 
{
	public function getMessages(){

	//	$messages = messages::paginate(15);
		//dd($messages);

		$message = DB::table('users')
        ->select('users.id AS user_ID','users.name','messages.content','messages.created_at','friends.friendID','messages.chat_ID','messages.id')
        ->join('messages','messages.user_ID','=','users.id')
        ->join('chats','chats.id','=','messages.chat_ID')
        ->join('friends','friends.id','=','chats.friend_ID')
        ->get();


         //dd($messages->first()->friendID);
         foreach ($message as $items)
         {
         	//echo ($items->friendID);
         	$friendname = DB::table('users')
	        ->select('users.name AS friendname')
	        ->join('messages','messages.user_ID','=','users.id')
	        ->join('chats','chats.id','=','messages.chat_ID')
	        ->join('friends','friends.id','=','chats.friend_ID')
	        ->where(['users.id'=>$items->friendID])->first();
	        //echo $friendname;
	       	  	$row= array_merge (['friendinfo'=>$friendname],['userinfo'=>$items]);
        		$messages[] = $row;
	        
         }
         	//dd($messages);
         //echo var_dump($friendname);
        return view('messageboard', compact('messages')); 
	}
}