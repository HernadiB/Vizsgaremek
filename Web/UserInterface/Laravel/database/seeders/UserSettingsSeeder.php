<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Database\Seeder;

class UserSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user)
        {
            UserSettings::create(['user_id' => $user->id]);
        }
    }
}
