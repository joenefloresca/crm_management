@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.surveyForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.survey-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.id') }}
                        </th>
                        <td>
                            {{ $surveyForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.campaign') }}
                        </th>
                        <td>
                            {{ $surveyForm->campaign->campaign ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.survey_name') }}
                        </th>
                        <td>
                            {{ $surveyForm->survey_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.first_name') }}
                        </th>
                        <td>
                            {{ $surveyForm->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.last_name') }}
                        </th>
                        <td>
                            {{ $surveyForm->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_1') }}
                        </th>
                        <td>
                            {{ $surveyForm->address_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_2') }}
                        </th>
                        <td>
                            {{ $surveyForm->address_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_3') }}
                        </th>
                        <td>
                            {{ $surveyForm->address_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_4') }}
                        </th>
                        <td>
                            {{ $surveyForm->address_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.city') }}
                        </th>
                        <td>
                            {{ $surveyForm->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.state') }}
                        </th>
                        <td>
                            {{ $surveyForm->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.county') }}
                        </th>
                        <td>
                            {{ $surveyForm->county }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.country') }}
                        </th>
                        <td>
                            {{ $surveyForm->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surveyForm.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $surveyForm->phone_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.survey-forms.index') }}">
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
            <a class="nav-link" href="#survey_form_survey_reponses" role="tab" data-toggle="tab">
                {{ trans('cruds.surveyReponse.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="survey_form_survey_reponses">
            @includeIf('admin.surveyForms.relationships.surveyFormSurveyReponses', ['surveyReponses' => $surveyForm->surveyFormSurveyReponses])
        </div>
    </div>
</div>

@endsection