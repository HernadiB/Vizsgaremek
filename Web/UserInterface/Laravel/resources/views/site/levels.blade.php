@extends('layouts.main')
@section('title', $title)

@section('js_css')
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/levels.js')}}"></script>
    <link rel="stylesheet" href="{{asset("css/levels_style.css")}}">
@endsection
@section('content')
    @if(session()->has('taskID'))
        <script>
            ScrollToTask({{session('taskID')}})
        </script>
    @else
        <script>
            GetTasks()
        </script>
    @endif
    <table class="levels">
        <h3 class="title">Szintek - feladatok</h3>
        <thead class="table-header">
        <tr>
            <th scope="col">Feladat szintje</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Feladat paraméterei</th>
        </tr>
        </thead>
        <tbody class="table-content">
        </tbody>
    </table>
    <template>
        <tr>
            <td id="levelname" data-label="Feladat szintje"></td>
            <td id="taskname" data-label="Feladat megnevezése"></td>
            <td id="view" data-label="Feladat paraméterei">
                <button class="btn btn-secondary" id="btn_viewTask" data-bs-toggle="modal" data-bs-target="#exampleModal">Megtekint</button>
            </td>
        </tr>
    </template>
    @include('components.modal')
@endsection