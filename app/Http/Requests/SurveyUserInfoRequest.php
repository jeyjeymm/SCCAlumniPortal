<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class SurveyUserInfoRequest extends Request
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

            'nickname' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'contact_number' => 'required',
            'civil_status' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'region_of_origin' => 'required',
            'province' => 'required',
            'location_of_residence' => 'required'

        ];
    }
}
