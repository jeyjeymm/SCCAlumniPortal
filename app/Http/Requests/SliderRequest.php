<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class SliderRequest extends Request
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
            'tagline' => 'required',
            'tagline_color' => 'required',
            'slogan' => 'required',
            'slogan_color' => 'required',
            'text_alignment' => 'required',
            'image_name' => 'required',
            'image_file' => 'required|mimes:jpg,jpeg,png,gif'
        ];
    }
}
