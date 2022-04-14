<link rel="stylesheet" href="{{asset("css/admin_style.css")}}">
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
        <h1 id="h1">Admin felület</h1>
    <div class="admin">
        <a href="{{route("site.adminteam")}}"> <button class="btn btn-dark " id="csapatombtn">Csapatom</button> </a>
        <a href=""> <button class="btn btn-dark" id="csapatombtn">Csapattag felvétele</button> </a>
    </div>
@endsection