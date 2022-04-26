@extends('layouts.main')
@section('title', $title)
@section('js_css')
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/myteam.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/myteam_style.css')}}">
@endsection
@section('content')
    @can('isAdmin', auth()->user())
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <button class="btn btn-dark text-white btn_myTeam" onclick="CsapatomShow()">Csapatom</button>
            </div>
            <div class="col-md-6 col-sm-12">
                <button class="btn btn-dark text-white btn_myTeam" onclick="CsapattagFelvetelShow()">Csapattag felvétele</button>
            </div>
        </div>
    @endcan
    @include('components.teamMembers')
    @can('isAdmin', auth()->user())
        @include('components.addTeamMember')
    @endcan
    @include('components.modal')
@endsection