<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

         if (Auth::check()) {

            $result = Auth::user()->role->id !== 3 ? true : false ;

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
            'title' => 'required',
            'image_file' => 'required|mimes:jpg,jpeg,png,gif',
            'image_name' => 'required',
            'description' => 'required',
            'body' => 'required',
            'published_at' => 'required'
        ];
    }
}
