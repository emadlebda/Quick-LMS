<?php

namespace App\Http\Requests;

use App\Models\QuestionsOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQuestionsOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('questions_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:questions_options,id',
        ];
    }
}
