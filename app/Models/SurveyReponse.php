<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SurveyReponse extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'survey_reponses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RESPONSE_SELECT = [
        'Yes'      => 'Yes',
        'Possibly' => 'Possibly',
        'No'       => 'No',
    ];

    protected $fillable = [
        'survey_form_id',
        'survey_question_id',
        'response',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function survey_form()
    {
        return $this->belongsTo(SurveyForm::class, 'survey_form_id');
    }

    public function survey_question()
    {
        return $this->belongsTo(SurveyQuestion::class, 'survey_question_id');
    }
}
