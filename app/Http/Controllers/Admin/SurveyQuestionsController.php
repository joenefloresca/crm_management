<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySurveyQuestionRequest;
use App\Http\Requests\StoreSurveyQuestionRequest;
use App\Http\Requests\UpdateSurveyQuestionRequest;
use App\Models\SurveyQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyQuestionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('survey_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyQuestions = SurveyQuestion::all();

        return view('admin.surveyQuestions.index', compact('surveyQuestions'));
    }

    public function create()
    {
        abort_if(Gate::denies('survey_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.surveyQuestions.create');
    }

    public function store(StoreSurveyQuestionRequest $request)
    {
        $surveyQuestion = SurveyQuestion::create($request->all());

        return redirect()->route('admin.survey-questions.index');
    }

    public function edit(SurveyQuestion $surveyQuestion)
    {
        abort_if(Gate::denies('survey_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.surveyQuestions.edit', compact('surveyQuestion'));
    }

    public function update(UpdateSurveyQuestionRequest $request, SurveyQuestion $surveyQuestion)
    {
        $surveyQuestion->update($request->all());

        return redirect()->route('admin.survey-questions.index');
    }

    public function show(SurveyQuestion $surveyQuestion)
    {
        abort_if(Gate::denies('survey_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyQuestion->load('surveyQuestionSurveyReponses');

        return view('admin.surveyQuestions.show', compact('surveyQuestion'));
    }

    public function destroy(SurveyQuestion $surveyQuestion)
    {
        abort_if(Gate::denies('survey_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroySurveyQuestionRequest $request)
    {
        SurveyQuestion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
