<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'trainer_id' => 'required|exists:trainers,id',
            'subject_id' => 'required|exists:subjects,id',
            'group_id' => 'required|exists:groups,id',
        ];
    }
}
