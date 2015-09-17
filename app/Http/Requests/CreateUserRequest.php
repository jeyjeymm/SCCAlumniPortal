<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class CreateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (Auth::check()) {

            $result = Auth::user()->role->id === 1 ? true : false ;

        }

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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'department_id' => 'required',
            'course_id' => 'required',
            'role_id' => 'required'
        ];
    }
}
