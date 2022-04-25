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
        <div class="buttons">
            <div class="row">
                <div class="col">
                    <button class="btn btn-dark" class="btn_myTeam my-3 " onclick="CsapatomShow()">Csapatom</button>
                    <button class="btn btn-dark" class="btn_myTeam my-3" onclick="CsapattagFelvetelShow()">Csapattag felvétele</button>
                </div>

            </div>
        </div>
    @endcan
    @include('components.teamMembers')
    @can('isAdmin', auth()->user())
        @include('components.addTeamMember')
    @endcan
    @include('components.modal')
@endsection