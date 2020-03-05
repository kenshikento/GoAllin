<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use App\chats;
use App\friends;
use App\User;
use Auth;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class chatController extends Controller 
{
	public function getMessages(Request $request)
	{
        $chat = messages::with('chat.friends.user')->get();     

        foreach ($chat as $chats)  
        {       
              // Data  
              $info = $chats->chat->friends->friendID;  
              // Friends name             
              $friendname = $this->getName($info);
              
              // User that is sending 
              $userID=$chats->user_ID;
              $username = $this->getName($userID);

              $message[] = [
                      'content'=>$chats->content,
                      'created_at'=>$chats->created_at,
                      'reciever'=>$friendname,
                      'sender'=>$username
                      ];

        }

        // Pagination code
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($message);
        $perPage = 5;

        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());
        return view('messageboard', ['message' => $paginatedItems]);
	}


    /**
     * Gets the name
     *
     * @return string
     */
    public function getName(int $id) : string
    {       
	    $friendsname = User::where('id','=',$id)->get();  
	    return $friendsname[0]->name;   
    }
}
