@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.surveyQuestion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.survey-questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.id') }}
                        </th>
                        <td>
                            {{ $surveyQuestion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.question') }}
                        </th>
                        <td>
                            {{ $surveyQuestion->question }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.code') }}
                        </th>
                        <td>
                            {{ $surveyQuestion->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $surveyQuestion->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.campaign') }}
                        </th>
                        <td>
                            {{ $surveyQuestion->campaign->campaign ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.survey-questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#survey_question_survey_reponses" role="tab" data-toggle="tab">
                {{ trans('cruds.surveyReponse.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="survey_question_survey_reponses">
            @includeIf('admin.surveyQuestions.relationships.surveyQuestionSurveyReponses', ['surveyReponses' => $surveyQuestion->surveyQuestionSurveyReponses])
        </div>
    </div>
</div>

@endsection