@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
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
                    <button class="btn btn-danger">Törlés</button>
                </td>
            </tr>
            @php $i++ @endphp
        @endforeach
        </tbody>
    </table>
@endsection