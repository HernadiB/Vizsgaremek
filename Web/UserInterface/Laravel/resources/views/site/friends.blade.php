@extends('layouts.main')
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/friends_style.css")}}">
@endsection
@section('title')
    {{$title}}
@endsection
@section('content')
    @if(count($friends) != 0)
        <h3 class="text-center">Barátaim</h3>
        <table class="barataim">
            <thead class="table-header">
            <tr>
                <th scope="col">Helyezés</th>
                <th scope="col">Név</th>
                <th scope="col">Pontszám</th>
                <th scope="col">Barát törlése</th>
                <th scope="col">Profil</th>
            </tr>
            </thead>
            <tbody>
            @foreach($friends as $key => $value)
                <tr @if ($value->id == auth()->user()->id) style="background: grey" @endif>
                    <td data-label="Helyezés">#{{$key}}</td>
                    <td data-label="Név">{{$value->username}}</td>
                    <td data-label="Pontszám">{{$value->score ?? "-"}}</td>
                    @if($value->id != auth()->user()->id)
                    {!! Form::open(['route' => 'friendDelete', 'method' => 'post']) !!}
                        <td data-label="Barát törlése">
                            <button name="friendID" value="{{$value->id}}" class="btn btn-danger">Törlés</button>
                        </td>
                    {!! Form::close() !!}
                    @else
                        <td></td>
                    @endif
                    <td data-label="Profil">
                        <button class="btn btn-dark">Megtekint</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-success mt-5 m-auto">Még nincsenek barátaid. Jelölj be néhányat!</div>
    @endif
    <div class="baratkereses">
        <div class="form-section">
            <h4 id="h4">Barátok keresése</h4>
{{--                <div class="nev row">--}}
{{--                    <label for="nev" class="col-lg-4 col-form-label">Felhasználó neve</label>--}}
{{--                    <div class="col-lg-8">--}}
{{--                        <input type="text" name="nev" class="form-control input" placeholder="Alfréd Mihály">--}}
{{--                    </div>--}}
{{--                </div>--}}
            <div class="table">
                <table class="barattabla">
                    <thead>
                    <tr>
                        <th scope="col">Név</th>
                        <th scope="col">Bejelöl</th>
                        <th scope="col">Profil</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nonFriends as $user)
                        <tr>
                            <td data-label="Név">{{$user->username}}</td>

                            {!! Form::open(['route' => 'friendInvite', 'method' => 'post']) !!}
                            <td data-label="Bejelöl">
                                <button name="userID" value="{{$user->id}}" class="btn btn-success">Bejelöl</button>
                            </td>
                            {!! Form::close() !!}
                            <td data-label="Profil">
                                <button class="btn btn-dark">Megtekint</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection