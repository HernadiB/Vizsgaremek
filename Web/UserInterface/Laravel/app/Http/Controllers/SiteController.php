<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function Country()
    {
        return view('site.country', [
            "title" => "Országos ranglista"
        ]);
    }
    public function Friends()
    {
        return view('site.friends', [
            "title" => "Barátaim"
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
}
