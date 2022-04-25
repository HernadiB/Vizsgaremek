@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@section('js_css')
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/levels.js')}}"></script>
    <link rel="stylesheet" href="{{asset("css/levels_style.css")}}">
@endsection
@section('script')
{{--    <script>--}}
{{--        GetTasks();--}}
{{--    </script>--}}
@endsection
@section('content')
    <table class="levels">
        <h3 class="title">Szintek - feladatok</h3>
        <thead class="table-header">
        <tr>
            <th scope="col">Szint neve</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Feladat leírása</th>
            <th scope="col">Feladat képe</th>
            <th scope="col">Kapható pontok</th>
        </tr>
        </thead>
        <tbody class="table-content">
            @foreach($tasks as $task)
                <tr @if(session('taskID') == $task->id) class="myTask" @endif>
                    <td id="levelname" data-label="Szint">{{\App\Models\Level::where('id', $task->level_id)->first()->name}}</td>
                    <td id="taskname" data-label="Név">{{$task->name}}</td>
                    <td id="description" data-label="Leírás">{{$task->description}}</td>
                    <td id="image" data-label="Kép">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="ShowTaskImage('{{$task->image}}')">Megtekint</button>
                    </td>
                    <td id="score" data-label="Pontszám">{{$task->score}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <template>
        <tr>
            <td id="levelname" data-label="Szint"></td>
            <td id="taskname" data-label="Név"></td>
            <td id="description" data-label="Leírás"></td>
            <td id="image" data-label="Megtekint">
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Megtekint</button>
            </td>
            <td id="score" data-label="Pontszám"></td>
        </tr>
    </template>
    @include('components.modal')
@endsection