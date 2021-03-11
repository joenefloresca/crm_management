@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.surveyReponse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.survey-reponses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="survey_form_id">{{ trans('cruds.surveyReponse.fields.survey_form') }}</label>
                <select class="form-control select2 {{ $errors->has('survey_form') ? 'is-invalid' : '' }}" name="survey_form_id" id="survey_form_id">
                    @foreach($survey_forms as $id => $survey_form)
                        <option value="{{ $id }}" {{ old('survey_form_id') == $id ? 'selected' : '' }}>{{ $survey_form }}</option>
                    @endforeach
                </select>
                @if($errors->has('survey_form'))
                    <div class="invalid-feedback">
                        {{ $errors->first('survey_form') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyReponse.fields.survey_form_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="survey_question_id">{{ trans('cruds.surveyReponse.fields.survey_question') }}</label>
                <select class="form-control select2 {{ $errors->has('survey_question') ? 'is-invalid' : '' }}" name="survey_question_id" id="survey_question_id">
                    @foreach($survey_questions as $id => $survey_question)
                        <option value="{{ $id }}" {{ old('survey_question_id') == $id ? 'selected' : '' }}>{{ $survey_question }}</option>
                    @endforeach
                </select>
                @if($errors->has('survey_question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('survey_question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyReponse.fields.survey_question_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.surveyReponse.fields.response') }}</label>
                <select class="form-control {{ $errors->has('response') ? 'is-invalid' : '' }}" name="response" id="response">
                    <option value disabled {{ old('response', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SurveyReponse::RESPONSE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('response', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('response'))
                    <div class="invalid-feedback">
                        {{ $errors->first('response') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyReponse.fields.response_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection