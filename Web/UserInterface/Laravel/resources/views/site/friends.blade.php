@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    @if(session("success"))
        <div id="alert" class="alert alert-success">{{session("success")}}</div>
    @endif
    @if(session("error"))
        <div class="alert alert-danger">{{session("error")}}</div>
    @endif
    @if(count($friends) != 0)
    <h3 class="text-center" id="cimsor">Barátaim</h3>
    <table class="barataim">
        <thead>
            <tr>
                <th scope="col">Helyezés</th>
                <th scope="col">Név</th>
                <th scope="col">Pontszám</th>
                <th scope="col">Barát törlése</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 1 @endphp
        @foreach($friends as $friend)
            <tr>
                <td data-label="Helyezés">{{$i}}</td>
                <td data-label="Név">{{$friend->username}}</td>
                <td data-label="Pontszám">{{$friend->score ?? "-"}}</td>
                <td data-label="Barát törlése">
                    {!! Form::open(['route' => 'friendDelete', 'method' => 'post']) !!}
                        <button name="friendID" value="{{$friend->id}}" class="btn btn-danger">Törlés</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @php $i++ @endphp
        @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-success mt-5 m-auto">Még nincsenek barátaid. Jelölj be néhányat!</div>
    @endif
@endsection