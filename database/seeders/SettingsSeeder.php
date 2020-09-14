<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name' => 'logo',
                'value' => '/assets/logo.png'
            ],
            [
                'name' => 'notification_mail',
                'value' => 'b7413bce5f-7e9ef6@inbox.mailtrap.io'
            ],
            [
                'name' => 'website_theme_color',
                'value' => '#5e72e4'
            ]
        ];


        $this->generator($settings);
    }

    private function generator(array $settings)
    {
        foreach ($settings as $setting)
        {
            Setting::create($setting);
        }
    }
}
