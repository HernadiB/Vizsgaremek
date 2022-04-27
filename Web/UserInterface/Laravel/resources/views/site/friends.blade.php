@extends('layouts.main')
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/friends_style.css")}}">
    <link rel="stylesheet" href="{{asset("/css/modal_style.css")}}">
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
@endsection
@section('title', $title)
@section('content')
    <script>
        GetNonFriends()
    </script>
    @if(count($friends) != 0)
        <h3 class="title">Barátaim</h3>
        <table class="friends">
            <thead class="table-header">
                <tr>
                    <th scope="col">Helyezés</th>
                    <th scope="col">Név</th>
                    <th scope="col">Pontszám</th>
                    <th scope="col">Barát törlése</th>
                    <th scope="col">Profil</th>
                </tr>
            </thead>
            <tbody class="table-content" id="friendsTable">
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
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="GetUserByID({{$value->id}})">Megtekint</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-success mt-5 m-auto">Még nincsenek barátaid. Jelölj be néhányat!</div>
    @endif
    <h4 class="title">Barátok keresése</h4>
        <div class="form-section">
            <div class="row d-flex">
                <input type="search" id="searchbar" class="form-control mb-4 m-auto w-50" placeholder="Keresés..." aria-label="Search" />

{{--                <button class="btn btn-light float-right" style="height: 35px; width: 200px" onclick="FiltersVisible()">Részletes szűrő</button>--}}
            </div>
            <div class="row mb-4">
                <div class="form-group">
                    <select name="gender" id="gender">
                        <option disabled hidden selected value> -- Válassz nemet -- </option>
                        @foreach($genders as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <select name="role" id="role">
                        <option disabled hidden selected value> -- Válassz hozzáférést -- </option>
                        @foreach($roles as $role)
                            <option value="{{$role}}">{{$role}}</option>
                        @endforeach
                    </select>
                    <select name="team" id="team">
                        <option disabled hidden selected value> -- Válassz csapatot -- </option>
                        @foreach($teams as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <select name="level" id="level">
                        <option disabled hidden selected value> -- Válassz rangot -- </option>
                        @foreach($levels as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    {!! Form::button('Szűrés', ['class' => 'btn btn-light mt-2 d-block', 'onclick' => 'NonFriendsFiltered()']) !!}
                </div>
            </div>
                <table class="searchFriends">
                    <thead class="table-header">
                        <tr>
                            <th scope="col">Név</th>
                            <th scope="col">Bejelöl</th>
                            <th scope="col">Profil</th>
                        </tr>
                    </thead>
                    <tbody class="table-content" id="nonFriendsTable">
                    </tbody>
                </table>
        </div>
        <template>
            <tr>
                <td data-label="Név" id="userName"></td>
                <td data-label="Bejelöl" id="userInvite">
                    <button name="userID" id="btn_userInvite" class="btn btn-success">Bejelöl</button>
                </td>
                <td data-label="Profil" id="userProfile">
                    <button class="btn btn-dark" id="btn_userProfile" data-bs-toggle="modal" data-bs-target="#exampleModal">Megtekint</button>
                </td>
            </tr>
        </template>
    @include('components.modal')
    <script src="{{asset('js/friends.js')}}"></script>
@endsection