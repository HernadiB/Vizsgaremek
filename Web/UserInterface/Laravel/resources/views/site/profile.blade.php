@extends('layouts.main')
@section('title', $title)
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/profile_style.css")}}">
@endsection
@section('content')
    <div class="profile">
        <h3 class="name">Üdv {{auth()->user()->username}}</h3>
        <img src="{{asset(auth()->user()->profile_picture)}}" alt="Profilkép" class="profilePicture" title="profilkep">
        <div class="form-section">
            <form action="{{route('userModify')}}" method="post" role="form" class="form-inline" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label for="full_name" class="col-lg-4 col-form-label">Teljes név*</label>
                    <div class="col-lg-8">
                        <input type="text" name="full_name" class="form-control input" value="{{auth()->user()->full_name}}">
                    </div>
                </div>
                <div class="row">
                    <label for="username" class="col-lg-4 col-form-label">Felhasználónév*</label>
                    <div class="col-lg-8">
                        <input type="text" name="username" class="form-control input" value="{{auth()->user()->username}}">
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="col-lg-4 col-form-label">E-mail cím*</label>
                    <div class="col-lg-8">
                        <input type="text" name="email" class="form-control input" value="{{auth()->user()->email}}">
                    </div>
                </div>
                <div class="row">
                    <label for="birthdate" class="col-lg-4 col-form-label">Születési dátum*</label>
                    <div class="col-lg-8">
                        <input type="date" name="birthdate" class="form-control input" value="{{auth()->user()->birthdate}}" id="input">
                    </div>
                </div>
                <div class="row">
                    <label for="gender" class="col-lg-4 col-form-label">Nem*</label>
                    <div class="col-lg-8">
                        <select name="gender" id="gender" class="form-select input"> //TODO: session gender selected
                            <option value="M">Férfi</option>
                            <option value="F">Nő</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="profile_picture" class="col-lg-4 col-form-label">Profilkép</label>
                    <div class="col-lg-8">
                        <input type="file" name="profile_picture" class="form-control input">
                    </div>
                </div>
                <div class="row">
                    <label for="password_new" class="col-lg-4 col-form-label">Új jelszó</label>
                    <div class="col-lg-8">
                        <input type="password" name="password_new" class="form-control input" placeholder="*************">
                    </div>
                </div>
                <div class="row">
                    <label for="password_new_confirmation" class="col-lg-4 col-form-label">Új jelszó megerősítése</label>
                    <div class="col-lg-8">
                        <input type="password" name="password_new_confirmation"  class="form-control input" placeholder="*************">
                    </div>
                </div>
                @include('components.validationErrors')
                <button class="btn btn-dark btn_save">Mentés</button>
            </form>
        </div>
        {!! Form::open(['route' => 'userDelete', 'method' => 'post']) !!}
            <button class="btn btn-danger btn_account_delete">Fiók törlése</button>
        {!! Form::close() !!}
    </div>
@endsection