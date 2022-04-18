<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function Country()
    {
        $currentUser = User::where('id', session()->get('user.id'))->first();
        $usersTop10 = User::where('role', 'user')->get()->sortByDesc('score')->take(10)->pluck('id');
        $usersAll = User::where('role', 'user')->get()->sortByDesc('score')->pluck('id');
        if($currentUser->role != 'admin')
        {
            if (!$usersTop10->contains('id', $currentUser['id']))
            {
                $usersTop10->push(User::where('id', $currentUser['id'])->first()->id);
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
        $user = User::where('id', session('user.id'))->first();
        $friends1 = $user->Friendships1;
        $friends2 = $user->Friendships2;
        $allfriends = $friends1->merge($friends2)->sortByDesc('score');

        $users = User::all();
        $sentrequests = $user->SentRequests;
        $receivedrequests = $user->ReceivedRequests;
        $nonfriends = $users->diff($allfriends)->diff($sentrequests)->diff($receivedrequests)->where('id', '!=', $user->id);
        return view('site.friends', [
            "title" => "Barátaim",
            "friends" => $allfriends,
            "nonFriends" => $nonfriends
        ]);
    }

    public function Index()
    {
        $user = User::where('id', session('user.id'))->first();
        $taskReviews = collect();
        $usersWithoutTeam = User::where('role', 'user')->where('team_id', null)->get();
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
            "usersWithoutTeam" => $usersWithoutTeam
        ]);
    }
    public function Levels()
    {
        $tasks = Task::all()->sortBy('level_id');
        return view('site.levels', [
            "title" => "Szintek",
            "tasks" => $tasks
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

    public function MyTeam()
    {
        $user = User::where('id', session('user.id'))->first();
        $teamLeader = null;
        $teamMembers = null;
        if($user->Team != null)
        {
            $teamLeader = $user->Team->Leader;
            $teamMembers = $user->Team->Members;
        }
        $usersWithoutTeam = User::where('role', 'user')->where('team_id', null)->get();
        return view('site.myteam', [
            "title" => "Csapatom",
            "teamLeader" => $teamLeader,
            "teamMembers" => $teamMembers,
            "usersWithoutTeam" => $usersWithoutTeam
        ]);
    }

    public function Profile()
    {
        return view('site.profile', [
            "title" => "Profilom"
        ]);
    }

    public function TeamMake()
    {
        return view('site.teammake', [
            "title" => "Csapat alapítás"
        ]);
    }

    public function Admin()
    {
        return view('site.admin', [
            "title" => "Admin felület"
        ]);
    }

    public function AdminTeam()
    {
        return view('site.adminteam', [
            "title" => "Admin csapat kezelése"
        ]);
    }

    public function AdminTeammate()
    {
        return view('site.adminteammate', [
            "title" => "Admin csapattagok kezelése"
        ]);
    }
}
