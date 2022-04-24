@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@section('js_css')
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/myteam.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/myteam_style.css')}}">
@endsection
@section('content')
    @can('isAdmin', auth()->user())
        <div id="buttons">
            <button class="btn btn-dark" id="csapatombtn" onclick="CsapatomShow()">Csapatom</button>
            <button class="btn btn-dark" id="csapatombtn" onclick="CsapattagFelvetelShow()">Csapattag felvétele</button>
        </div>
    @endcan
    @include('components.teamMembers')
    @can('isAdmin', auth()->user())
        @include('components.addTeamMember')
    @endcan
    @include('components.modal')
@endsection