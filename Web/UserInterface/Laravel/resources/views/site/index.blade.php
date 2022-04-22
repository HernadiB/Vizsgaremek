@extends('layouts.main')
@section('js_css')
    <link rel="stylesheet" href="{{asset("css/index_style.css")}}">
    <script src="{{asset('js/index.js')}}"></script>
@endsection
@section('title')
    {{$title}}
@endsection
@section('content')
    @can(['userIsBelowEighteen'], auth()->user())
        @include('components.belowEighteenIndex')
    @else
        @include('components.aboveSeventeenIndex')
    @endif

    @include('components.modal')
@endsection