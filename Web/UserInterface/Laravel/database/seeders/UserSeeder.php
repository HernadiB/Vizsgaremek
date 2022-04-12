<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/users.json");
        $users = json_decode($json);

        foreach ($users as $key => $value) {
            User::create([
                "full_name" => $value->full_name,
                "username" => $value->username,
                "birthdate" => $value->birthdate,
                "gender" => $value->gender,
                "email" => $value->email,
                "password" => bcrypt($value->password),
                "role" => $value->role,
                "score" => $value->score,
                "team_id" => $value->team_id,
                "level_id" => $value->level_id
            ]);
        }
    }
}
