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
