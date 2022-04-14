@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
@if(count(\App\Models\User::where('id', session('user.id'))->first()->ActualTasks) != 0)
    <table class="feladataim">
        <h3 class="text-center" id="cimsor">Aktuális feladataim</h3>
        <thead>
        <tr>
            <th scope="col">Feladat sorszáma</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Feladat</th>
            <th scope="col">Státusz</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\User::where('id', session('user.id'))->first()->ActualTasks as $actualTask)
        <tr>
            <td data-label="Feladat sorszáma">{{$actualTask->id}}</td>
            <td data-label="Feladat megnevezése">{{$actualTask->name}}</td>
            <td data-label="Feladat">
                <button class="btn btn-dark">Megtekint</button>
            </td>
            @if($actualTask->pivot->is_done == 1)
                <td data-label="Státusz">&#10004</td>
            @else
                <td data-label="Státusz">&#x274C;</td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
@else

@endif
@endsection