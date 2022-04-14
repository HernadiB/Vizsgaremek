<link rel="stylesheet" href="{{asset("css/adminteam_style.css")}}">
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    <h1 id="h1">Csapatom</h1>
    <div class="team">
        <table class="csapatom">
            <thead>
            <tr>
                <th scope="col">Helyezés</th>
                <th scope="col">Név</th>
                <th scope="col">Pontszám</th>
                <th scope="col">Törlés</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="Helyezés">#1</td>
                <td data-label="Név">Biliboc Bence</td>
                <td data-label="Pontszám">1234</td>
                <td data-label="Barát törlése">
                    <button class="btn btn-danger">Törlés</button>
                </td>
            </tr>
            <tr>
                <td data-label="Helyezés">#2</td>
                <td data-label="Név">Hernádi Barnabás</td>
                <td data-label="Pontszám">1234</td>
                <td data-label="Barát törlése">
                    <button class="btn btn-danger">Törlés</button>
                </td>
            </tr>
            <tr>
                <td data-label="Helyezés">#3</td>
                <td data-label="Név">Nyári Roland</td>
                <td data-label="Pontszám">1234</td>
                <td data-label="Barát törlése">
                    <button class="btn btn-danger">Törlés</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection