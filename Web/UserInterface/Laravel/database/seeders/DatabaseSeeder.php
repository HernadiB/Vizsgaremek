<?php

namespace Database\Seeders;

use App\Models\UserSettings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LevelSeeder::class,
            TaskSeeder::class,
            TeamSeeder::class,
            UserSeeder::class,
            TeamModifierSeeder::class,
            UserSettingsSeeder::class]);
    }
}
