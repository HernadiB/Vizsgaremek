@extends('layouts.main')
@section('title', $title)
@section('content')
    @if(count(auth()->user()->ActualTasks) != 0)
        <table class="tasks">
            <h3 class="title">Aktuális feladataim</h3>
            <thead class="table-header">
            <tr>
                <th scope="col">Feladat sorszáma</th>
                <th scope="col">Feladat megnevezése</th>
                <th scope="col">Feladat</th>
                <th scope="col">Beadás</th>
                <th scope="col">Státusz</th>
            </tr>
            </thead>
            <tbody class="table-content">
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
                        <td data-label="Beadás">
                            <button name="taskID" value="{{$actualTask->id}}" class="btn btn-success">Beadom!</button>
                        </td>
                    @else
                        <td data-label="Beadás">-</td>
                    @endif
                {!! Form::close() !!}
                @if($actualTask->pivot->status == "finished")
                    <td data-label="Státusz">&#10004;</td>
                @elseif($actualTask->pivot->status == "unfinished")
                    <td data-label="Státusz">&#x274C;</td>
                @else
                    <td data-label="Státusz">&#x23F3;</td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection