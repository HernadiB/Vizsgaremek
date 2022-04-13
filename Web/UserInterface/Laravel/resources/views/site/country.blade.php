@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@section('js_css')
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/country.js')}}"></script>
@endsection
@include('site.nav')
@section('script')
    <script>
        GetCountryLeaderboard();
    </script>
@endsection
@section('content')
    <table class="orszagos">
        <h3 class="text-center" id="cimsor" >Országos Pontállás</h3>
        <thead>
        <tr>
            <th scope="col">Helyezés</th>
            <th scope="col">Név</th>
            <th scope="col">Pontszám</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <template>
        <tr>
            <td id="rank" data-label="Helyezés"></td>
            <td id="name" data-label="Név"></td>
            <td id="score" data-label="Pontszám"></td>
        </tr>
    </template>
@endsection