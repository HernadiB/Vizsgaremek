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
            $user = User::create([
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

            $user->Friendships1()->sync($value->friendships);
            $user->SentRequests()->sync($value->sent_requests);
            $user->ReceivedRequests()->sync($value->received_requests);
            if ($value->tasks != null)
            {
                foreach ($value->tasks as $key=>$value)
                {
                    $user->ActualTasks()->attach([$key => ['is_done' => $value]]);
                }
            }
        }
    }
}
