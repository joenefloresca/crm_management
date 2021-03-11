<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySurveyFormRequest;
use App\Http\Requests\StoreSurveyFormRequest;
use App\Http\Requests\UpdateSurveyFormRequest;
use App\Models\Campaign;
use App\Models\SurveyForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyFormsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('survey_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyForms = SurveyForm::with(['campaign'])->get();

        $campaigns = Campaign::get();

        return view('admin.surveyForms.index', compact('surveyForms', 'campaigns'));
    }

    public function create()
    {
        abort_if(Gate::denies('survey_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::all()->pluck('campaign', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.surveyForms.create', compact('campaigns'));
    }

    public function store(StoreSurveyFormRequest $request)
    {
        $surveyForm = SurveyForm::create($request->all());

        return redirect()->route('admin.survey-forms.index');
    }

    public function edit(SurveyForm $surveyForm)
    {
        abort_if(Gate::denies('survey_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::all()->pluck('campaign', 'id')->prepend(trans('global.pleaseSelect'), '');

        $surveyForm->load('campaign');

        return view('admin.surveyForms.edit', compact('campaigns', 'surveyForm'));
    }

    public function update(UpdateSurveyFormRequest $request, SurveyForm $surveyForm)
    {
        $surveyForm->update($request->all());

        return redirect()->route('admin.survey-forms.index');
    }

    public function show(SurveyForm $surveyForm)
    {
        abort_if(Gate::denies('survey_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyForm->load('campaign', 'surveyFormSurveyReponses');

        return view('admin.surveyForms.show', compact('surveyForm'));
    }

    public function destroy(SurveyForm $surveyForm)
    {
        abort_if(Gate::denies('survey_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyForm->delete();

        return back();
    }

    public function massDestroy(MassDestroySurveyFormRequest $request)
    {
        SurveyForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
