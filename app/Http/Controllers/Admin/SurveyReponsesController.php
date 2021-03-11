<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySurveyReponseRequest;
use App\Http\Requests\StoreSurveyReponseRequest;
use App\Http\Requests\UpdateSurveyReponseRequest;
use App\Models\SurveyForm;
use App\Models\SurveyQuestion;
use App\Models\SurveyReponse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyReponsesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('survey_reponse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyReponses = SurveyReponse::with(['survey_form', 'survey_question'])->get();

        $survey_forms = SurveyForm::get();

        $survey_questions = SurveyQuestion::get();

        return view('admin.surveyReponses.index', compact('surveyReponses', 'survey_forms', 'survey_questions'));
    }

    public function create()
    {
        abort_if(Gate::denies('survey_reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $survey_forms = SurveyForm::all()->pluck('survey_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $survey_questions = SurveyQuestion::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.surveyReponses.create', compact('survey_forms', 'survey_questions'));
    }

    public function store(StoreSurveyReponseRequest $request)
    {
        $surveyReponse = SurveyReponse::create($request->all());

        return redirect()->route('admin.survey-reponses.index');
    }

    public function edit(SurveyReponse $surveyReponse)
    {
        abort_if(Gate::denies('survey_reponse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $survey_forms = SurveyForm::all()->pluck('survey_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $survey_questions = SurveyQuestion::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $surveyReponse->load('survey_form', 'survey_question');

        return view('admin.surveyReponses.edit', compact('survey_forms', 'survey_questions', 'surveyReponse'));
    }

    public function update(UpdateSurveyReponseRequest $request, SurveyReponse $surveyReponse)
    {
        $surveyReponse->update($request->all());

        return redirect()->route('admin.survey-reponses.index');
    }

    public function show(SurveyReponse $surveyReponse)
    {
        abort_if(Gate::denies('survey_reponse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyReponse->load('survey_form', 'survey_question');

        return view('admin.surveyReponses.show', compact('surveyReponse'));
    }

    public function destroy(SurveyReponse $surveyReponse)
    {
        abort_if(Gate::denies('survey_reponse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyReponse->delete();

        return back();
    }

    public function massDestroy(MassDestroySurveyReponseRequest $request)
    {
        SurveyReponse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
