<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Task;
use Illuminate\Database\Seeder;
use File;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/tasks.json");
        $tasks = json_decode($json);

        foreach ($tasks as $key => $value) {
            Task::create([
                "name" => $value->nev,
                "description" => $value->leiras,
                "score" => $value->pontszam,
                "level_id" => Level::where("name", $value->level)->first()->id
            ]);
        }
    }
}
