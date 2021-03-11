<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Survey Questions
    Route::delete('survey-questions/destroy', 'SurveyQuestionsController@massDestroy')->name('survey-questions.massDestroy');
    Route::resource('survey-questions', 'SurveyQuestionsController');

    // Campaigns
    Route::delete('campaigns/destroy', 'CampaignsController@massDestroy')->name('campaigns.massDestroy');
    Route::resource('campaigns', 'CampaignsController');

    // Survey Forms
    Route::delete('survey-forms/destroy', 'SurveyFormsController@massDestroy')->name('survey-forms.massDestroy');
    Route::resource('survey-forms', 'SurveyFormsController');

    // Survey Reponses
    Route::delete('survey-reponses/destroy', 'SurveyReponsesController@massDestroy')->name('survey-reponses.massDestroy');
    Route::resource('survey-reponses', 'SurveyReponsesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
