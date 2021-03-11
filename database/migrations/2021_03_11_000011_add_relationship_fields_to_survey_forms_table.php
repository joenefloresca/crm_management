<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSurveyFormsTable extends Migration
{
    public function up()
    {
        Schema::table('survey_forms', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id', 'campaign_fk_3404094')->references('id')->on('campaigns');
        });
    }
}
