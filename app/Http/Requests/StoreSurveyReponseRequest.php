<?php

namespace App\Http\Requests;

use App\Models\SurveyReponse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSurveyReponseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('survey_reponse_create');
    }

    public function rules()
    {
        return [];
    }
}
