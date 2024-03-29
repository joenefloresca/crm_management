<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'survey_question_create',
            ],
            [
                'id'    => 18,
                'title' => 'survey_question_edit',
            ],
            [
                'id'    => 19,
                'title' => 'survey_question_show',
            ],
            [
                'id'    => 20,
                'title' => 'survey_question_delete',
            ],
            [
                'id'    => 21,
                'title' => 'survey_question_access',
            ],
            [
                'id'    => 22,
                'title' => 'campaign_create',
            ],
            [
                'id'    => 23,
                'title' => 'campaign_edit',
            ],
            [
                'id'    => 24,
                'title' => 'campaign_show',
            ],
            [
                'id'    => 25,
                'title' => 'campaign_delete',
            ],
            [
                'id'    => 26,
                'title' => 'campaign_access',
            ],
            [
                'id'    => 27,
                'title' => 'survey_form_create',
            ],
            [
                'id'    => 28,
                'title' => 'survey_form_edit',
            ],
            [
                'id'    => 29,
                'title' => 'survey_form_show',
            ],
            [
                'id'    => 30,
                'title' => 'survey_form_delete',
            ],
            [
                'id'    => 31,
                'title' => 'survey_form_access',
            ],
            [
                'id'    => 32,
                'title' => 'survey_reponse_create',
            ],
            [
                'id'    => 33,
                'title' => 'survey_reponse_edit',
            ],
            [
                'id'    => 34,
                'title' => 'survey_reponse_show',
            ],
            [
                'id'    => 35,
                'title' => 'survey_reponse_delete',
            ],
            [
                'id'    => 36,
                'title' => 'survey_reponse_access',
            ],
            [
                'id'    => 37,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
