<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Task;
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
        $friends1 = User::where('id', session('user.id'))->first()->Friendships1;
        $friends2 = User::where('id', session('user.id'))->first()->Friendships2;
        $allfriends = $friends1->merge($friends2)->sortByDesc('score');
        return view('site.friends', [
            "title" => "Barátaim",
            "friends" => $allfriends
        ]);
    }

    public function Index()
    {
        return view('site.index', [
            "title" => "Főoldal"
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
        return view('site.myteam', [
            "title" => "Csapatom"
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
