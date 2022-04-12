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
                <label for="nev" class="form-label">Teljes név</label>
                <input type="text" name="nev" class="form-control" id="input" placeholder="Alfréd Mihály">
            </div>
            <div class="felhnev">
                <label for="felhnev" class="form-label">Felhasználónév</label>
                <input type="text" name="nev" class="form-control" id="input" placeholder="alfred.mihaly">
            </div>
            <div class="szuldat">
                <label for="szuldat" class="form-label">Születési dátum</label>
                <input type="text" name="szuldat" class="form-control" id="input" placeholder="2000.1.10">
            </div>
            <div class="nemek">
                <label for="neme" class="form-label">Nem</label>
                <select name="neme" id="neme" class="form-select">
                    <option value="fiu">Fiú</option>
                    <option value="lány">Lány</option>
                </select>
            </div>

            <div class="email">
                <label for="email" class="form-label">E-mail cím</label>
                <input type="text" name="email" required class="form-control" id="input" placeholder="alfred.mihaly@example.com">
                <span></span>
            </div>
            <div class="passwd">
                <label for="passwd" class="form-label">Jelszó</label>
                <input type="password" name="passwd" required class="form-control" id="input" placeholder="*************">
                <span></span>
            </div>
            <div class="passwd">
                <label for="passwdscnd" class="form-label">Jelszó megerősítése</label>
                <input type="password" name="passwdscnd" required class="form-control" id="input" placeholder="*************">
                <span></span>
            </div>
            <button class="btn">Regisztráció</button>
            <div class="signup-link">
                <p>Már van fiókom <a href="{{route("site.login")}}">Bejelentkezek</a></p>
            </div>
        </form>
    </div>
@endsection