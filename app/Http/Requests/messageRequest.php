<?php

namespace App\Http\Requests;
use App\Requests\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\validMessage;
use App\Rules\validEmail;
use App\Rules\validexeemail;
use App\Rules\validMessageduplicates;

class messageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
               
            'email'   => ['required', new validEmail, new validexeemail()],    
            'message' => ['required', new validMessage, new validMessageduplicates($this->email)],          
        ];
    }
}
