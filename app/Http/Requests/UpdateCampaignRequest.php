<?php

namespace App\Http\Requests;

use App\Models\Campaign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCampaignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('campaign_edit');
    }

    public function rules()
    {
        return [
            'campaign' => [
                'string',
                'required',
                'unique:campaigns,campaign,' . request()->route('campaign')->id,
            ],
        ];
    }
}
