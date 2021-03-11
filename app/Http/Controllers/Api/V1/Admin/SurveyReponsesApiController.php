<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurveyReponseRequest;
use App\Http\Requests\UpdateSurveyReponseRequest;
use App\Http\Resources\Admin\SurveyReponseResource;
use App\Models\SurveyReponse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyReponsesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('survey_reponse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SurveyReponseResource(SurveyReponse::with(['survey_form', 'survey_question'])->get());
    }

    public function store(StoreSurveyReponseRequest $request)
    {
        $surveyReponse = SurveyReponse::create($request->all());

        return (new SurveyReponseResource($surveyReponse))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SurveyReponse $surveyReponse)
    {
        abort_if(Gate::denies('survey_reponse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SurveyReponseResource($surveyReponse->load(['survey_form', 'survey_question']));
    }

    public function update(UpdateSurveyReponseRequest $request, SurveyReponse $surveyReponse)
    {
        $surveyReponse->update($request->all());

        return (new SurveyReponseResource($surveyReponse))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SurveyReponse $surveyReponse)
    {
        abort_if(Gate::denies('survey_reponse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveyReponse->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
