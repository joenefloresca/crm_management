<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSurveyQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id', 'campaign_fk_3404152')->references('id')->on('campaigns');
        });
    }
}
