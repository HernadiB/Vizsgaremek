@extends('layouts.main')
@section('title')
{{$title}}
@endsection
@section('js_css')
<link rel="stylesheet" href="{{asset("css/setting_style.css")}}">
@endsection
@section('content')
    <div class="form-section">
        <h2>Beállítások</h2>
        <hr>
        <form action="" method="post">
            @csrf
            <div class="toggler">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Smooth Háttér Ki/Be</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Dark mode Ki/Be</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Időjárás jelentő a főoldalon</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">NEU áramfejlesztő lekapcsolása</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
            </div>
        </form>
    </div>
@endsection