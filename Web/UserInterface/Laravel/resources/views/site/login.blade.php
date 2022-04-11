<link rel="stylesheet" href="{{asset("css/login_style.css")}}">
<script src="https://kit.fontawesome.com/a47f91ad4b.js" crossorigin="anonymous"></script>

@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
<div class="form-section">
        <h2><i class="fa-solid fa-user"></i>Bejelentkezés</h2>
    <hr>
    <form action="">
        <div class="email">
            <label for="email" class="form-label">E-mail cím</label>
            <input type="text" name="email" class="form-control" id="input" required placeholder="alfred.mihaly@example.com">
            <span></span>
        </div>
        <div class="passwd">
            <label for="passwd" class="form-label">Jelszó</label>
            <input type="password" name="passwd" class="form-control" id="input" required placeholder="*************">
            <span></span>
        </div>
        <button class="btn">Bejelentkezés</button>
        <div class="signup-link">
            <p>Még nincs fiókom <a href="{{route("site.signup")}}">Regisztrálok</a></p>
        </div>
    </form>
</div>
@endsection