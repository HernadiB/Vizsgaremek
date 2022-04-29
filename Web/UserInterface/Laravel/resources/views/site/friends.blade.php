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
                        <td data-label="Barát törlése">-</td>
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
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <input type="search" class="form-control search mt-3" placeholder="Keresés..." aria-label="Search" />
                </div>
                <div class="col-md-6 col-sm-12">
                    <button class="btn btnDetailedFilter btn-light w-100 mt-3" onclick="FiltersVisible()">Részletes szűrő</button>
                </div>
            </div>
            <div class="form-group filters d-none">
                <div class="row">
                   <div class="col-lg-6">
                       <select name="gender" id="gender" class="form-select">
                           <option selected value> -- Válassz nemet -- </option>
                           @foreach($genders as $key=>$value)
                               <option value="{{$key}}">{{$value}}</option>
                           @endforeach
                       </select>
                   </div>
                    <div class="col-lg-6">
                        <select name="role" id="role" class="form-select">
                            <option selected value> -- Válassz hozzáférést -- </option>
                            @foreach($roles as $role)
                                <option value="{{$role}}">{{$role}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <select name="team" id="team" class="form-select">
                            <option selected value> -- Válassz csapatot -- </option>
                            @foreach($teams as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <select name="level" id="level" class="form-select">
                            <option selected value> -- Válassz rangot -- </option>
                            @foreach($levels as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {!! Form::button('Szűrés', ['class' => 'btn btn-light btnFilter d-block mt-3 w-50', 'onclick' => 'NonFriendsFiltered()']) !!}
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
            @if(count($sentRequests) != 0)
                <h3 class="title">Elküldött baráti kérelmek</h3>
                <table class="sentRequests">
                    <thead class="table-header">
                    <tr>
                        <th scope="col">Név</th>
                        <th scope="col">Kérelem törlése</th>
                        <th scope="col">Profil</th>
                    </tr>
                    </thead>
                    <tbody class="table-content" id="sentRequestsTable">
                    @foreach($sentRequests as $key => $value)
                        <tr>
                            <td data-label="Név">{{$value->username}}</td>
                            {!! Form::open(['route' => 'sentRequestDelete', 'method' => 'post']) !!}
                            <td data-label="Törlés">
                                <button name="personID" value="{{$value->id}}" class="btn btn-danger">Törlés</button>
                            </td>
                            {!! Form::close() !!}
                            <td data-label="Profil">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="GetUserByID({{$value->id}})">Megtekint</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($blockedPeople) != 0)
                <h3 class="title">Blokkolt felhasználók</h3>
                <table class="blockedUsers">
                    <thead class="table-header">
                    <tr>
                        <th scope="col">Név</th>
                        <th scope="col">Felhasználó feloldása</th>
                        <th scope="col">Profil</th>
                    </tr>
                    </thead>
                    <tbody class="table-content" id="blockedUsersTable">
                    @foreach($blockedPeople as $key => $value)
                        <tr>
                            <td data-label="Név">{{$value->username}}</td>
                            {!! Form::open(['route' => 'userBlockRelease', 'method' => 'post']) !!}
                            <td data-label="Feloldás">
                                <button name="personID" value="{{$value->id}}" class="btn btn-danger">Feloldás</button>
                            </td>
                            {!! Form::close() !!}
                            <td data-label="Profil">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="GetUserByID({{$value->id}})">Megtekint</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
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