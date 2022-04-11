<link rel="stylesheet" href="{{asset("css/signup_style.css")}}">
<script src="https://kit.fontawesome.com/a47f91ad4b.js" crossorigin="anonymous"></script>
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    <div class="form-section">
        <h2><i class="fa-solid fa-user"></i>Regisztráció</h2>

        <hr>
        <form action="">
            <div class="nev">
                <label for="nev">Teljes név</label>
                <input type="text" name="nev">
            </div>
            <div class="felhnev">
                <label for="felhnev">Felhasználónév</label>
                <input type="text" name="nev">
            </div>
            <div class="email">
                <label for="email">E-mail cím</label>
                <input type="text" name="email" required>
                <span></span>
            </div>
            <div class="passwd">
                <label for="passwd">Jelszó</label>
                <input type="password" name="passwd" required>
                <span></span>
            </div>
            <div class="passwd">
                <label for="passwdscnd">Jelszó megerősítése</label>
                <input type="password" name="passwdscnd" required>
                <span></span>
            </div>
            <button class="btn">Bejelentkezés</button>
            <div class="signup-link">
                <p>Már van fiókom <a href="{{route("site.login")}}">Bejelentkezés</a></p>
            </div>
        </form>
    </div>
@endsection