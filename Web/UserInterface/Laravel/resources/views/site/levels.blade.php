<link rel="stylesheet" href="{{asset("css/levels_style.css")}}">
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@section('js_css')
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/levels.js')}}"></script>
@endsection
@include('site.nav')
@section('script')
    <script>
        GetTasks();
    </script>
@endsection
@section('content')
    <table class="szintek">
        <h3 id="cimsor" class="text-center" >Szintek - feladatok</h3>
        <thead>
        <tr>
            <th scope="col">Szint neve</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Feladat leírása</th>
            <th scope="col">Kapható pontok</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <template>
        <tr>
            <td id="levelname" data-label="Név"></td>
            <td id="taskname" data-label="Név"></td>
            <td id="description" data-label="Leírás"></td>
            <td id="score" data-label="Pontszám"></td>
        </tr>
    </template>
@endsection