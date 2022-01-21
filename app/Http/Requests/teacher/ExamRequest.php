<?php

namespace App\Http\Requests\teacher;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            "title"=>'required|min:3|max:50',
            "discription"=>'required',
            "startDate"=>'required',
            "endDate"=>'required',
            "startTime"=>'required',
            "endTime"=>'required',
        ];
    }
}
