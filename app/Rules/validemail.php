<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;

class validemail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $userid = Auth::user()->email;
        if ($value === $userid)
            
            {
                return false;
            }
                return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please try not to send yourself a message.';
    }

    
}
