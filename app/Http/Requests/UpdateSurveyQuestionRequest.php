<?php

namespace App\Http\Requests;

use App\Models\SurveyQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSurveyQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('survey_question_edit');
    }

    public function rules()
    {
        return [
            'question'  => [
                'string',
                'required',
            ],
            'code'      => [
                'string',
                'required',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
