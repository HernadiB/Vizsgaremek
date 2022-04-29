<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function Country()
    {
        $currentUser = auth()->user();
        $usersAll = User::where('role', 'user')->get()->sortByDesc('score')->pluck('id');
        $usersBelow18 = collect();
        foreach ($usersAll as $user)
        {
            if (date_diff(date_create(User::findorfail($user)->birthdate), date_create('now'))->y < 18)
            {
                $usersBelow18->push($user);
            }
        }
        $usersTop10 = $usersBelow18->take(10);
        if(auth()->check())
        {
            if($currentUser->role != 'admin' && date_diff(date_create($currentUser->birthdate), date_create('now'))->y < 18)
            {
                if (!$usersTop10->contains('id', $currentUser['id']))
                {
                    $usersTop10->push(User::where('id', $currentUser['id'])->first()->id);
                }
            }
        }

        foreach ($usersTop10 as $user)
        {
            $leaderboardRanks[array_search($user, $usersAll->toarray())+1] = User::where('id', $user)->first();
        }
        return view('site.country', [
            "title" => "Országos ranglista",
            "users" => $leaderboardRanks
        ]);
    }
    public function Friends()
    {
        $currentUser = auth()->user();
        $friends1 = $currentUser->Friendships1;
        $friends2 = $currentUser->Friendships2;
        $friendsAll = $friends1->merge($friends2);
        $friendsAll = $friendsAll->push(User::where('id', $currentUser['id'])->first());
        $friendsAll = $friendsAll->sortByDesc('score')->pluck('id');
        $friendsTop10 = $friendsAll->take(10);

        if (!$friendsTop10->contains('id', $currentUser['id']))
        {
            $friendsTop10->push(User::where('id', $currentUser['id'])->first()->id);
        }
        foreach ($friendsTop10 as $user)
        {
            $leaderboardRanks[array_search($user, $friendsAll->toarray())+1] = User::where('id', $user)->first();
        }
        return view('site.friends', [
            "title" => "Barátaim",
            "friends" => $leaderboardRanks,
            "sentRequests" => $currentUser->SentRequests,
            "blockedPeople" => $currentUser->BlockedPeople,
            "genders" => ["F" => "Nő", "M" => "Férfi"],
            "roles" => ["admin", "user"],
            "teams" => Team::all()->pluck("name", "id"),
            "levels" => Level::all()->pluck("name", "id")
        ]);
    }

    public function Index()
    {
        $user = auth()->user();
        $taskReviews = collect();
        $usersWithoutTeam = User::where('role', 'user')->where('team_id', null)->where('id','!=', $user->id)->get();
        $usersBelow18WithoutTeam = collect();
        foreach($usersWithoutTeam as $user)
        {
            if (date_diff(date_create($user->birthdate), date_create('now'))->y < 18)
            {
                $usersBelow18WithoutTeam->push($user);
            }
        }
        if ($user->role == "admin")
        {
            if ($user->Team != null)
            {
                $teamMembers = $user->Team->Members;
                foreach ($teamMembers as $teamMember)
                {
                    $tasksToReview = $teamMember->ActualTasks->where('pivot.status', 'underReview');
                    foreach ($tasksToReview as $taskToReview)
                    {
                        $taskReviews->push($taskToReview->pivot);
                    }
                }
            }
        }
        return view('site.index', [
            "title" => "Főoldal",
            "taskReviews" => $taskReviews,
            "usersBelow18WithoutTeam" => $usersBelow18WithoutTeam
        ]);
    }
    public function Levels()
    {
        return view('site.levels', [
            "title" => "Szintek"
        ]);
    }
    public function Login()
    {
        return view('site.login', [
            "title" => "Bejelentkezés"
        ]);
    }
    public function MyTasks()
    {
        return view('site.mytasks', [
            "title" => "Feladataim"
        ]);
    }
    public function Signup()
    {
        return view('site.signup', [
            "title" => "Regisztráció"
        ]);
    }

    public function Settings()
    {
        return view('site.settings', [
            "title" => "Beállítások"
        ]);
    }

    public function MyTeam()
    {
        $user = auth()->user();
        $team = null;
        if($user->Team != null)
        {
            $team = $user->Team;
        }
        $usersWithoutTeam = User::where('role', 'user')->where('team_id', null)->get();
        return view('site.myteam', [
            "title" => "Csapatom",
            "team" => $team,
            "usersWithoutTeam" => $usersWithoutTeam
        ]);
    }

    public function Profile()
    {
        return view('site.profile', [
            "title" => "Profilom",
            "genders" => ["F" => "Nő", "M" => "Férfi"],
        ]);
    }
}
