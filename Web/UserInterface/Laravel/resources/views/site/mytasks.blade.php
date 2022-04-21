@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    @if(session("success"))
        <div id="alert" class="alert alert-success">{{session("success")}}</div>
    @endif
@if(auth()->user()->ActualTasks) != 0)
    <table class="feladataim">
        <h3 class="text-center" id="cimsor">Aktuális feladataim</h3>
        <thead>
        <tr>
            <th scope="col">Feladat sorszáma</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Feladat</th>
            <th scope="col">Elvégezve</th>
            <th scope="col">Státusz</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\User::where('id', session('user.id'))->first()->ActualTasks as $actualTask)
        <tr>
            <td data-label="Feladat sorszáma">{{$actualTask->id}}</td>
            <td data-label="Feladat megnevezése">{{$actualTask->name}}</td>
            {!! Form::open(['route' => 'taskView', 'method' => 'post']) !!}
                <td data-label="Feladat">
                    <button name="taskID" value="{{$actualTask->id}}" class="btn btn-dark">Megtekint</button>
                </td>
            {!! Form::close() !!}
            {!! Form::open(['route' => 'taskFinish', 'method' => 'post']) !!}
                @if($actualTask->pivot->status == "unfinished")
                    <td data-label="Elvégezve">
                        <button name="taskID" value="{{$actualTask->id}}" class="btn btn-success">Kész</button>
                    </td>
                @else
                    <td></td>
                @endif
            {!! Form::close() !!}
            @if($actualTask->pivot->status == "finished")
                <td data-label="Státusz">&#10004</td>
            @elseif($actualTask->pivot->status == "unfinished")
                <td data-label="Státusz">&#x274C;</td>
            @else
                <td data-label="Státusz">Under review</td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
@else

@endif
@endsection