<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;
class validexeemail implements Rule
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
        $exist = DB::table('users')->where('email','=',$value)->count();
        if($exist > 0){
            return true;
        }
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your Friend does not exist.';
    }
}
