<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\messages;
use App\friends;
use Auth;
use DB;
use App\Rules\validMessageexceeds;
use App\Http\Requests\messageRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $userid = Auth::user()->id;
        $username = Auth::user()->name; 
        
        $friends = messages::with('chat.friends.user')->get();

        foreach($friends as $friend){
	        if($friend->chat->friends->friendID == $userid){
		        $friendID = $friend->user_ID;
		        $friendsname = User::where('id','=',$friendID)->get();  
		        $name = $friendsname[0]->name;

		        $nameto =$friend->chat->friends->User->name;
		        $info[] = [     
		        	'sender'=> $name,
		            'sent'=> $friend->created_at,
		            'content'=>$friend->content,
		            'user'=>$username,
		        ]; 
	        }       
        } 

        $messages = ([$info]);

        return view('home', compact('messages')); 
    }
}
