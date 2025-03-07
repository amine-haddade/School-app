<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'session_date' => 'required|date',
            'week_id' => 'required|exists:weeks,id',
            'group_id' => 'required|exists:groups,id',
            'trainer_id' => 'required|exists:trainers,id',
            'subject_id' => 'required|exists:subjects,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'day' => 'required|string',
            'session_number' => 'required|integer',
            'duration' => 'required|integer',
        ];
    }
}
