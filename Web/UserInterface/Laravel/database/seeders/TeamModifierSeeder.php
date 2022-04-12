<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Support\Facades\DB;

class TeamModifierSeeder extends Seeder
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
            DB::table('teams')->where('name', $value->name)->update(['leader_id' => User::where('full_name', $value->leader)->first()->id]);
        }
    }
}