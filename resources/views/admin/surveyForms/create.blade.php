@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.surveyForm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.survey-forms.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="campaign_id">{{ trans('cruds.surveyForm.fields.campaign') }}</label>
                <select class="form-control select2 {{ $errors->has('campaign') ? 'is-invalid' : '' }}" name="campaign_id" id="campaign_id">
                    @foreach($campaigns as $id => $campaign)
                        <option value="{{ $id }}" {{ old('campaign_id') == $id ? 'selected' : '' }}>{{ $campaign }}</option>
                    @endforeach
                </select>
                @if($errors->has('campaign'))
                    <div class="invalid-feedback">
                        {{ $errors->first('campaign') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.campaign_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="survey_name">{{ trans('cruds.surveyForm.fields.survey_name') }}</label>
                <input class="form-control {{ $errors->has('survey_name') ? 'is-invalid' : '' }}" type="text" name="survey_name" id="survey_name" value="{{ old('survey_name', '') }}">
                @if($errors->has('survey_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('survey_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.survey_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.surveyForm.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.surveyForm.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_1">{{ trans('cruds.surveyForm.fields.address_1') }}</label>
                <input class="form-control {{ $errors->has('address_1') ? 'is-invalid' : '' }}" type="text" name="address_1" id="address_1" value="{{ old('address_1', '') }}">
                @if($errors->has('address_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.address_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_2">{{ trans('cruds.surveyForm.fields.address_2') }}</label>
                <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', '') }}">
                @if($errors->has('address_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_3">{{ trans('cruds.surveyForm.fields.address_3') }}</label>
                <input class="form-control {{ $errors->has('address_3') ? 'is-invalid' : '' }}" type="text" name="address_3" id="address_3" value="{{ old('address_3', '') }}">
                @if($errors->has('address_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.address_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_4">{{ trans('cruds.surveyForm.fields.address_4') }}</label>
                <input class="form-control {{ $errors->has('address_4') ? 'is-invalid' : '' }}" type="text" name="address_4" id="address_4" value="{{ old('address_4', '') }}">
                @if($errors->has('address_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.address_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.surveyForm.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.surveyForm.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="county">{{ trans('cruds.surveyForm.fields.county') }}</label>
                <input class="form-control {{ $errors->has('county') ? 'is-invalid' : '' }}" type="text" name="county" id="county" value="{{ old('county', '') }}">
                @if($errors->has('county'))
                    <div class="invalid-feedback">
                        {{ $errors->first('county') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.county_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.surveyForm.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.surveyForm.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.surveyForm.fields.phone_number_helper') }}</span>
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