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
        $usersAll = User::where('role', 'user')->get()->sortByDesc('score')->pluck('id');
        $usersTop10 = $usersAll->take(10);
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
        $currentUser = User::where('id', session('user.id'))->first();
        $friends1 = $currentUser->Friendships1;
        $friends2 = $currentUser->Friendships2;
        $friendsAll = $friends1->merge($friends2);
        $friendsAll = $friendsAll->push(User::where('id', $currentUser['id'])->first());
        $friendsAll = $friendsAll->sortByDesc('score')->pluck('id');
        $friendsTop10 = $friendsAll->take(10);
        if($currentUser->role != 'admin')
        {
            if (!$friendsTop10->contains('id', $currentUser['id']))
            {
                $friendsTop10->push(User::where('id', $currentUser['id'])->first()->id);
            }
        }
        foreach ($friendsTop10 as $user)
        {
            $leaderboardRanks[array_search($user, $friendsAll->toarray())+1] = User::where('id', $user)->first();
        }
        $users = User::all();
        $sentrequests = $currentUser->SentRequests;
        $receivedrequests = $currentUser->ReceivedRequests;
        $nonfriends = $users->diff($friends1->merge($friends2))->diff($sentrequests)->diff($receivedrequests)->where('id', '!=', $currentUser->id);
        return view('site.friends', [
            "title" => "Barátaim",
            "friends" => $leaderboardRanks,
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
