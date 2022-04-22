@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/signup_style.css")}}">
    <script src="https://kit.fontawesome.com/a47f91ad4b.js" crossorigin="anonymous"></script>
@endsection
@section('content')
    <div class="form-section">
        <h2><i class="fa-solid fa-user"></i>Regisztráció</h2>
        <hr>
        <form action="{{route('userSignup')}}" method="post">
            @csrf
            <div class="nev">
                <label for="full_name" class="form-label">Teljes név</label>
                <input type="text" name="full_name" class="form-control" id="input" placeholder="Alfréd Mihály">
            </div>
            <div class="felhnev">
                <label for="username" class="form-label">Felhasználónév</label>
                <input type="text" name="username" class="form-control" id="input" placeholder="alfred.mihaly">
            </div>
            <div class="szuldat">
                <label for="birthdate" class="form-label">Születési dátum</label>
                <input type="date" name="birthdate" class="form-control" id="input">
            </div>
            <div class="nemek">
                <label for="gender" class="form-label">Nem</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="M">Férfi</option>
                    <option value="F">Nő</option>
                </select>
            </div>

            <div class="email">
                <label for="email" class="form-label">E-mail cím</label>
                <input type="text" name="email" class="form-control" id="input" placeholder="alfred.mihaly@example.com">
                <span></span>
            </div>
            <div class="passwd">
                <label for="password" class="form-label">Jelszó</label>
                <input type="password" name="password" class="form-control" id="input" placeholder="*************">
                <span></span>
            </div>
            <div class="passwd">
                <label for="password_confirmation" class="form-label">Jelszó megerősítése</label>
                <input type="password" name="password_confirmation" class="form-control" id="input" placeholder="*************">
                <span></span>
            </div>
            <button class="btn">Regisztráció</button>
            <div class="signup-link">
                <p>Már van fiókom <a href="{{route("site.login")}}">Bejelentkezek</a></p>
            </div>
        </form>
    </div>
@endsection