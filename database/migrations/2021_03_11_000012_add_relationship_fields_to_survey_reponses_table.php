<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSurveyReponsesTable extends Migration
{
    public function up()
    {
        Schema::table('survey_reponses', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_form_id')->nullable();
            $table->foreign('survey_form_id', 'survey_form_fk_3404100')->references('id')->on('survey_forms');
            $table->unsignedBigInteger('survey_question_id')->nullable();
            $table->foreign('survey_question_id', 'survey_question_fk_3404101')->references('id')->on('survey_questions');
        });
    }
}
