<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;
use App\User;
use App\chats;
use App\messages;
class validMessageduplicates implements Rule
{
    protected $email;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $friendsemail = $this->email;
        $friendsID = User::where('email',$friendsemail)->pluck('id');
        $chatID = chats::where('friend_ID',$friendsID)->pluck('id');
        if ($chatID->isEmpty())
        {
            $chatID = 0;
        }
        
        $message = messages::where('content','=',$value)->where('chat_ID','=',$chatID)->count();

        if($message >= 1){

            return false;

        } else {

            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please try another Word';
    }
}
