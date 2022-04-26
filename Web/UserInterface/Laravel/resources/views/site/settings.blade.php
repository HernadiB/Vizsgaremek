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
        <form action="" method="post">
            @csrf
            <div class="toggler">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="simpleBackground">Smooth Háttér Be/Ki</label>
                    <input class="form-check-input" type="checkbox" id="movingBackground" onclick="simpleBg()">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="darkBackground">Dark mode Be/Ki</label>
                    <input class="form-check-input" type="checkbox" id="darkBackground" onclick="changeMode()">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Időjárás jelentő a főoldalon</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
            </div>
        </form>
    </div>
@endsection