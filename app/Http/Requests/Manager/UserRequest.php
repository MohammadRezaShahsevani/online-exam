<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "firstname"=>'required|min:3|max:30',
            "lastname"=>'required|min:3|max:30',
            "birth_date"=>'required',
            "national_code"=>'required|min:10|max:10',
            "email"=>'required|email:rfc',
        ];
    }
}
