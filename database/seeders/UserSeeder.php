<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '17291234',
            'role_id' => 1
        ]);

        User::create([
            'name' => 'employee',
            'email' => 'employee@example.com',
            'password' => '17291234',
            'role_id' => 2
        ]);
    }
}
