<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Survey Questions
    Route::apiResource('survey-questions', 'SurveyQuestionsApiController');

    // Campaigns
    Route::apiResource('campaigns', 'CampaignsApiController');

    // Survey Forms
    Route::apiResource('survey-forms', 'SurveyFormsApiController');

    // Survey Reponses
    Route::apiResource('survey-reponses', 'SurveyReponsesApiController');
});
