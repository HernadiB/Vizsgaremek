@extends('layouts.main')
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/index_style.css")}}">
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
@endsection
@section('title',$title)
@section('content')
    @can(['userIsBelowEighteen'], auth()->user())
        @include('components.belowEighteenIndex')
    @else
        @include('components.aboveSeventeenIndex')
    @endif

    @include('components.modal')
@endsection