@extends('layouts.main')
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/index_style.css")}}">
    <link rel="stylesheet" href="{{asset("/css/modal_style.css")}}">
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
    <script src="{{asset('js/weather.js')}}"></script>
@endsection
@section('title',$title)
@section('weather')
    @can('viewWeather')
        @include('components.weather')
    @endcan
@endsection
@section('content')
    @can(['userIsBelowEighteen'], auth()->user())
        @include('components.belowEighteenIndex')
    @else
        @include('components.aboveSeventeenIndex')
    @endif
@endsection
@include('components.modal')