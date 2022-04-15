@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    @if(\App\Models\User::where('id', session('user.id'))->first()->team_id != null)
        @if(count(\App\Models\User::where('id', session('user.id'))->first()->TeamMembers) != 0)
        <table class="csapatom">
            <h3 class="text-center" id="cimsor">Csapatom</h3>
            <thead>
            <tr>
                <th scope="col">Helyezés</th>
                <th scope="col">Név</th>
                <th scope="col">Pontszám</th>
            </tr>
            </thead>
            <tbody>
            @php $i = 1 @endphp
            @foreach(\App\Models\User::where('id', session('user.id'))->first()->TeamMembers as $teamMember)
                <tr>
                    <td data-label="Helyezés">{{$i}}</td>
                    <td data-label="Név">{{$teamMember->username}}</td>
                    <td data-label="Pontszám">{{$teamMember->score}}</td>
                </tr>
                @php $i++ @endphp
            @endforeach
            </tbody>
        </table>
        @else
            //Nincsnek csapattagok
        @endif
    @else
        <h1 class="text-center" style="margin-top: 100px">Még nincs csapatod :(</h1>
    @endif
@endsection