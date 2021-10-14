<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Chats;
use App\Friends;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;

class ChatController extends Controller 
{
	public function index(ChatFormRequest $request)
	{
        $chat = messages::with('chat.friends.user')->get();     

        // need to use collection and use map
        foreach ($chat as $chats) {       
            // Data  
            $info = $chats->chat->friends->friendID;  
            // Friends name             
            $friendname = User::where('id', $info)->first();
              
            // User that is sending 
            $userID = $chats->user_ID;
            $username = User::where('id', $id)->first();

            // use collection
            $message[] = [
                'content'=> $chats->content,
                'created_at'=> $chats->created_at,
                'reciever'=> $friendname,
                'sender'=> $username
            ];
        }

        // Pagination code // make global pagination
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
          
        $itemCollection = collect($message);
        $perPage = 5;

        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());

        return view('messageboard', ['message' => $paginatedItems]);
	}
}
