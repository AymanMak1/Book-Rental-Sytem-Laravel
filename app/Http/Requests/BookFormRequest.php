<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required|max:255', // |unique:books,title
            'slug' => 'max:510',
            'author'=>'required|max:255',
            'released_at'=>'required|before:now',
            'description'=>'nullable',
            'cover_image' => 'mimes:jpg,png,jpeg|max:5048',
            'language_code'=>'nullable',
            'pages'=>'required|min:0    ',
            'isbn'=>'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i', // |unique:books,isbn
            'in_stock'=>'required|min:0'
        ];
    }
}
