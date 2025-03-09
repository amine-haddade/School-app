<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeekRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'week_number' => 'required|integer|unique:weeks,week_number',
            'school_year_id' => 'required|exists:school_years,id',
            'start_date' => 'required|date|unique:weeks,start_date',
            'end_date' => 'required|date|unique:weeks,end_date',
        ];
    }
}
