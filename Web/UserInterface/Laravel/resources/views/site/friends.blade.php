<link rel="stylesheet" href="{{asset("css/friends_style.css")}}">
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    @if(session("success"))
        <div id="alert" class="alert alert-success">{{session("success")}}</div>
    @endif
    @if(session("error"))
        <div class="alert alert-danger">{{session("error")}}</div>
    @endif
    <div class="baratkereses">
        <div class="form-section">
            <form action="" method="" role="form" class="form-inline">
                <h4 id="h4">Barátok keresése</h4>
                <div class="nev row">
                    <label for="nev" class="col-lg-4 col-form-label">Felhasználó neve</label>
                    <div class="col-lg-8">
                        <input type="text" name="nev" class="form-control input" placeholder="Alfréd Mihály">
                    </div>
                </div>
                <div class="table">
                    <table class="barattabla">
                        <thead>
                        <tr>
                            <th scope="col">Név</th>
                            <th scope="col">Profil</th>
                            <th scope="col">Bejelöl</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td data-label="Név">Biliboc Bence</td>
                            <td data-label="Profil">
                                <button class="btn btn-dark">Megtekint</button>
                            </td>
                            <td data-label="Bejelöl">
                                <button class="btn btn-success">Bejelöl</button>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Név">Hernádi Barnabás</td>
                            <td data-label="Profil">
                                <button class="btn btn-dark">Megtekint</button>
                            </td>
                            <td data-label="Bejelöl">
                                <button class="btn btn-success">Bejelöl</button>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Név">Nyári Roland</td>
                            <td data-label="Profil">
                                <button class="btn btn-dark">Megtekint</button>
                            </td>
                            <td data-label="Bejelöl">
                                <button class="btn btn-success">Bejelöl</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    @if(count($friends) != 0)
    <h3 class="text-center">Barátaim</h3>
    <table class="barataim">
        <thead>
            <tr>
                <th scope="col">Helyezés</th>
                <th scope="col">Név</th>
                <th scope="col">Pontszám</th>
                <th scope="col">Barát törlése</th>
                <th scope="col">Profil</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 1 @endphp
        @foreach($friends as $friend)
            <tr>
                <td data-label="Helyezés">{{$i}}</td>
                <td data-label="Név">{{$friend->username}}</td>
                <td data-label="Pontszám">{{$friend->score ?? "-"}}</td>
                <td data-label="Barát törlése">
                    {!! Form::open(['route' => 'friendDelete', 'method' => 'post']) !!}
                        <button name="friendID" value="{{$friend->id}}" class="btn btn-danger">Törlés</button>
                    {!! Form::close() !!}
                </td>
                <td data-label="Profil">
                    <button class="btn btn-dark">Megtekint</button>
                </td>
            </tr>
            @php $i++ @endphp
        @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-success mt-5 m-auto">Még nincsenek barátaid. Jelölj be néhányat!</div>
    @endif
@endsection