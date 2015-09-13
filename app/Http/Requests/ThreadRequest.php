<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class ThreadRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $result = Auth::check() ? true : false ;

        return $result;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required'
        ];
    }

    public function messages(){
    
        return [

            'title.required' => 'Please fill up the title field.',
            'body.required' => 'Please fill up the body field.'

        ];
            
    }
}
