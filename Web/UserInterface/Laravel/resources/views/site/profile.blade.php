<link rel="stylesheet" href="{{asset("css/profile_style.css")}}">
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    <div class="profil">
        <h3 class="text-center" style="margin-top: 100pt;">Üdv Felhasználónév</h3>

        <img src="https://picsum.photos/200" alt="Profilkép" id="profilkep" title="profilkep">

        <div class="form-section">
            <form action="" method="" role="form" class="form-inline">
                <div class="nev row">
                    <label for="nev" class="col-lg-4 col-form-label">Teljes név</label>
                    <div class="col-lg-8">
                        <input type="text" name="nev" class="form-control input" placeholder="Alfréd Mihály">
                    </div>
                </div>
                <div class="felhnev row">
                    <label for="felhnev" class="col-lg-4 col-form-label">Felhasználónév</label>
                    <div class="col-lg-8">
                        <input type="text" name="nev" class="form-control input" placeholder="alfred.mihaly">
                    </div>
                </div>
                <div class="email row">
                    <label for="email" class="col-lg-4 col-form-label">E-mail cím</label>
                    <div class="col-lg-8">
                        <input type="text" name="email" class="form-control input" placeholder="alfred.mihaly@example.com">
                    </div>
                </div>
                <div class="passwd row">
                    <label for="passwd" class="col-lg-4 col-form-label">Jelszó</label>
                    <div class="col-lg-8">
                        <input type="password" name="passwd" class="form-control input" placeholder="*************">
                    </div>
                </div>
                <div class="passwd row">
                    <label for="passwdscnd" class="col-lg-4 col-form-label">Jelszó megerősítése</label>
                    <div class="col-lg-8">
                        <input type="password" name="passwdscnd"  class="form-control input" placeholder="*************">
                    </div>
                </div>
                <div class="profilepic row">
                    <label for="profilep" class="col-lg-4 col-form-label">Profilkép</label>
                    <div class="col-lg-8">
                        <input type="file" name="profilep" class="form-control input">
                    </div>
                </div>
                <button class="btn btn-dark mentes">Mentés</button>
            </form>
        </div>

        <button class="btn btn-danger fioktorles">Fiók törlése</button>
    </div>
@endsection