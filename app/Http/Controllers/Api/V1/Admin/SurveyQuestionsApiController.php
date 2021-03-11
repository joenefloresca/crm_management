<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurveyQuestionRequest;
use App\Http\Requests\UpdateSurveyQuestionRequest;
use App\Http\Resources\Admin\SurveyQuestionResource;
use App\Models\SurveyQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyQuestionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('survey_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SurveyQuestionResource(SurveyQuestion::all());
    }

    public function store(StoreSurveyQuestionRequest $request)
    {
        $surveyQuestion = SurveyQuestion::create($request->all());

        return (new SurveyQuestionResource($surveyQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SurveyQuestion $surveyQuestion)
    {
        abort_if(Gate::denies('survey_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SurveyQuestionResource($surveyQuestion);
    }

    public function update(UpdateSurveyQuestionRequest $request, SurveyQuestion $surveyQuestion)
    {
        $surveyQuestion->update($request->all());

        return (new SurveyQuestionResource($surveyQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SurveyQuestion $surveyQuestion)
    {
        abort_if(Gate::denies('survey_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyQuestion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
