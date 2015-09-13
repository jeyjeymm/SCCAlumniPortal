<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class ProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

         if (Auth::check()) {

            $result = Auth::user()->role->id === 3 ? true : false ;

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

            'nickname' => 'required',
            'image_file' => 'required|mimes:jpg,jpeg,png,gif',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'contact_number' => 'required',
            'civil_status' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'region_of_origin' => 'required',
            'province' => 'required',
            'location_of_residence' => 'required',
            'about_me' => 'required'

        ];
    }


    public function messages(){
    
        return [

            'about_me.required' => 'Please say a little something about yourself.'

        ];
            
    }
}
