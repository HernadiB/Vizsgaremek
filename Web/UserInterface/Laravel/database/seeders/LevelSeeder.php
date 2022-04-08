<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use File;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/levels.json");
        $levels = json_decode($json);
        foreach ($levels as $key => $value) {
            Level::create([
                "name" => $value->name,
            ]);
        }
    }
}
