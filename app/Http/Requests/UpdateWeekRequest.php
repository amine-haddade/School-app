<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeekRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'week_number' => 'required|integer',
            'school_year_id' => 'required|exists:school_years,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }
}
