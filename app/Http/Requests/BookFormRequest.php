<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'released_at'=>'required|before:now',
            'description'=>'nullable',
            'language_code'=>'nullable',
            'pages'=>'required|min:0    ',
            'isbn'=>'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            'in_stock'=>'required|min:0'
        ];
    }
}
