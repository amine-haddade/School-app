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
            'start_year' => 'required|date_format:Y|unique:school_years,start_year',
            'end_year' => 'required|date_format:Y|unique:school_years,end_year',
        ];
    }
}
