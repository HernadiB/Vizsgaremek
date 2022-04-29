@extends('layouts.main')
@section('title', $title)
@section('js_css')
    <link rel="stylesheet" href="{{asset('css/myteam_style.css')}}">
    <link rel="stylesheet" href="{{asset("/css/modal_style.css")}}">
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/myteam.js')}}"></script>
@endsection
@section('content')
    @can('isAdmin', auth()->user())
        <div class="row">
            <div class="col-md-6 col-sm-12 text-center">
                <button class="btn btn-dark myTeam" onclick="CsapatomShow()">Csapatom</button>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <button class="btn btn-dark myTeam" onclick="CsapattagFelvetelShow()">Csapattag felvétele</button>
            </div>
        </div>
    @endcan
    @include('components.teamMembers')
    @can('isAdmin', auth()->user())
        @include('components.addTeamMember')
    @endcan
    @can('isAdmin', auth()->user())
        {!! Form::open(['route' => 'teamDelete', 'method' => 'post']) !!}
            <button class="btn btn-danger btn_team_delete">Csapat törlése</button>
        {!! Form::close() !!}
    @endcan
    @include('components.modal')
@endsection
