@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.surveyQuestion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.survey-questions.update", [$surveyQuestion->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="question">{{ trans('cruds.surveyQuestion.fields.question') }}</label>
                <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text" name="question" id="question" value="{{ old('question', $surveyQuestion->question) }}" required>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyQuestion.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.surveyQuestion.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $surveyQuestion->code) }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyQuestion.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $surveyQuestion->is_active || old('is_active', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_active">{{ trans('cruds.surveyQuestion.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyQuestion.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="campaign_id">{{ trans('cruds.surveyQuestion.fields.campaign') }}</label>
                <select class="form-control select2 {{ $errors->has('campaign') ? 'is-invalid' : '' }}" name="campaign_id" id="campaign_id">
                    @foreach($campaigns as $id => $campaign)
                        <option value="{{ $id }}" {{ (old('campaign_id') ? old('campaign_id') : $surveyQuestion->campaign->id ?? '') == $id ? 'selected' : '' }}>{{ $campaign }}</option>
                    @endforeach
                </select>
                @if($errors->has('campaign'))
                    <div class="invalid-feedback">
                        {{ $errors->first('campaign') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyQuestion.fields.campaign_helper') }}</span>
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