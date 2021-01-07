<?php

namespace App\Http\Requests;

use App\Models\QuestionsOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionsOptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('questions_option_create');
    }

    public function rules()
    {
        return [
            'option_text' => [
                'required',
            ],
            'is_correct'  => [
                'required',
            ],
        ];
    }
}
