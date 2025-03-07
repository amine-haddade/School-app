<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'field_id' => 'required|exists:fields,id',
            'in_person_hours' => 'required|integer',
            'online_hours' => 'required|integer',
            'exam_type' => 'required|string',
            'semester' => 'required|string',
        ];
    }
}
