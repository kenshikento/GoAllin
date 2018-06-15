<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use App\chats;
use App\friends;
use Auth;
use DB;
use App\Rules\validMessageexceeds;
use App\Http\Requests\messageRequest;
class ContentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getContent()
    {
    	return view('content');
    }


    public function store(Request $request)
    {
 
    }	

    public function postInfo(messageRequest $request)
    {   
        $content = $request->message;
        // User's ID that is currently login 
        $userid = Auth::user()->id;
        // Friends ID
        $users = DB::table('users')->select('name', 'email as user_email','id')
        ->where('email',$request->email)
        ->first();

        // Initial Friend model insert
        $frienduser = $users->id; // 1-2 
        $friend = new friends;
        $friend ->status   = 1;   
        $friend ->user_ID  = $userid; 
        $friend ->friendID = $frienduser;       
        $friend ->save();

        $getfriendID = DB::table('friends')->select('id')
        ->where('friendID',$frienduser)
        ->first();
        $getFriend = $getfriendID->id;
        
        // Chat 
        $chat = new chats;
        $chat ->status = 1;
        $chat ->friend_ID = $getFriend;
        $chat ->save();

        // Chat - Getting the id thats just need inserted
        $getchatID = DB::table('chats')->select('id')
        ->where('friend_ID',$getFriend)
        ->first();
        $chatID = $getchatID->id;

        // Messages      
        $message = new messages;
        $message ->status   = 1;
        $message ->user_ID  = $userid; 
        $message ->chat_ID  = $chatID;
        $message ->content  = $content;
        $message ->save();

        return redirect()->back();

    }   

    public function viewContent()
    {
       // dd('view post page');
    }

    public function deleteUser(){
        //
    }
}
