<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SurveyForm extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'survey_forms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'campaign_id',
        'survey_name',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'address_3',
        'address_4',
        'city',
        'state',
        'county',
        'country',
        'phone_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function surveyFormSurveyReponses()
    {
        return $this->hasMany(SurveyReponse::class, 'survey_form_id', 'id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
