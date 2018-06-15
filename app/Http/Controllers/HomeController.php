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
 
      /*  
        $messages = messages::all()->where('user_ID','!=',$userid)->sortByDesc('created_at');
        $messages = messages::all()->sortByDesc('created_at');
        return view('home', compact('messages'));
*/

/*     Query style*/
       $messages = DB::table('users')
        ->select('users.id AS user_ID','users.name','messages.content','messages.created_at','friends.friendID','messages.chat_ID','messages.id')
        ->join('messages','messages.user_ID','=','users.id')
        ->join('chats','chats.id','=','messages.chat_ID')
        ->join('friends','friends.id','=','chats.friend_ID')
        ->where(['friends.friendID'=>$userid,'friends.status'=>1])->get();

        

        // Eloquent style
   /*     $messages = friends::whereHas('friendID',function($query){
            $query->where('friendID','=',$userID);
        })->get();
        
        $messages = friends::select('friendID',function($query){
        $query->where('friendID','=',$userID);
        })->get();
*/

       return view('home', compact('messages'));
//dd(DB::getQueryLog());
   // dd($messages);
       // dd($messages);
    }

    
}
