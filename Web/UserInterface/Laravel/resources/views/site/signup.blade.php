@extends('layouts.main')
@section('title', $title)
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/signup_style.css")}}">
    <script src="https://kit.fontawesome.com/a47f91ad4b.js" crossorigin="anonymous"></script>
@endsection
@section('content')
    @include('components.validationErrors')
    <div class="form-section">
        <h2><i class="fa-solid fa-user"></i>Regisztráció</h2>
        <hr>
        <form action="{{route('userSignup')}}" method="post">
            @csrf
            <div class="nev">
                <label for="full_name" class="form-label">Teljes név</label>
                <input type="text" name="full_name" class="form-control input" placeholder="Alfréd Mihály" value="{{old('full_name')}}">
            </div>
            <div class="felhnev">
                <label for="username" class="form-label">Felhasználónév</label>
                <input type="text" name="username" class="form-control input" placeholder="alfred.mihaly" value="{{old('username')}}">
            </div>
            <div class="szuldat">
                <label for="birthdate" class="form-label">Születési dátum</label>
                <input type="date" name="birthdate" class="form-control input" value="{{old('birthdate')}}">
            </div>
            <div class="nemek">
                <label for="gender" class="form-label">Nem</label>
                <select name="gender" class="form-select input">
                    <option selected value="M">Férfi</option>
                    <option value="F">Nő</option>
                </select>
            </div>
            <div class="email">
                <label for="email" class="form-label">E-mail cím</label>
                <input type="text" name="email" class="form-control input" placeholder="alfred.mihaly@example.com" value="{{old('email')}}">
                <span></span>
            </div>
            <div class="passwd">
                <label for="password" class="form-label">Jelszó</label>
                <input type="password" name="password" class="form-control input" placeholder="*************">
                <span></span>
            </div>
            <div class="passwd">
                <label for="password_confirmation" class="form-label">Jelszó megerősítése</label>
                <input type="password" name="password_confirmation" class="form-control input" placeholder="*************">
                <span></span>
            </div>
            <button class="btn">Regisztráció</button>
            <div class="signup-link">
                <p>Már van fiókom <a href="{{route("site.login")}}">Bejelentkezek</a></p>
            </div>
        </form>
    </div>
@endsection