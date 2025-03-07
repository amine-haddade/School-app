<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolYearRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start_year' => 'required|date_format:Y',
            'end_year' => 'required|date_format:Y',
        ];
    }
}
