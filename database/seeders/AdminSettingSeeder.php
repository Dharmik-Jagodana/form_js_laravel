<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminSetting;

class AdminSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminSetting = [
            [
                'name' => 'Title',
                'slug' => 'title',
                'value' => '',
            ],
            [
                'name' => 'Logo',
                'slug' => 'logo',
                'value' => '',
            ],
            [
                'name' => 'Favicon Icon',
                'slug' => 'favicon_icon',
                'value' => '',
            ],
        ];

        foreach ($adminSetting as $key => $value) {
            $find = AdminSetting::whereSlug($value['name'])->first();
            if (is_null($find)) {
                AdminSetting::create($value);
            }
        }
    }
}
