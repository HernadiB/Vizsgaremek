@extends('layouts.main')
@section('title')
{{$title}}
@endsection
@section('js_css')
<link rel="stylesheet" href="{{asset("css/setting_style.css")}}">
<script src="{{asset('js/setting.js')}}"></script>
@endsection
@section('content')
    <div class="form-section">
        <h2>Beállítások</h2>
        <hr>
        <form action="{{route("settingsSave")}}" method="post">
            @csrf
            <div class="toggler">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="darkBackground">Dark mode Be/Ki</label>
                    <input class="form-check-input" type="checkbox" @if($settings->dark_mode) checked @endif name="dark_mode">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Időjárás jelentő a főoldalon</label>
                    <input class="form-check-input" type="checkbox" @if($settings->weather) checked @endif name="weather">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="darkBackground">Felhasználó tiltása kérelem elutasítás után</label>
                    <input class="form-check-input" type="checkbox" @if($settings->block_after_rejection) checked @endif name="block_after_rejection">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="darkBackground">Barát tiltása törlés után</label>
                    <input class="form-check-input" type="checkbox" @if($settings->block_after_delete) checked @endif name="block_after_delete">
                </div>
            </div>
            <button class="btn btn-success btn_save_settings">Beállítások mentése</button>
        </form>
    </div>
@endsection