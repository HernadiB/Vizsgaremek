<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use File;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/teams.json");
        $teams = json_decode($json);

        foreach ($teams as $key => $value) {
            Team::create([
                "name" => $value->name,
                "description" => $value->description
            ]);
        }
    }
}
