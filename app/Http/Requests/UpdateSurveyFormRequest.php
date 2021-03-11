<?php

namespace App\Http\Requests;

use App\Models\SurveyForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSurveyFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('survey_form_edit');
    }

    public function rules()
    {
        return [
            'survey_name'  => [
                'string',
                'nullable',
            ],
            'first_name'   => [
                'string',
                'nullable',
            ],
            'last_name'    => [
                'string',
                'nullable',
            ],
            'address_1'    => [
                'string',
                'nullable',
            ],
            'address_2'    => [
                'string',
                'nullable',
            ],
            'address_3'    => [
                'string',
                'nullable',
            ],
            'address_4'    => [
                'string',
                'nullable',
            ],
            'city'         => [
                'string',
                'nullable',
            ],
            'state'        => [
                'string',
                'nullable',
            ],
            'county'       => [
                'string',
                'nullable',
            ],
            'country'      => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
