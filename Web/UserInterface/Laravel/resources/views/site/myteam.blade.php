@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    <table class="csapatom">
        <h3 class="text-center" id="cimsor">Csapatom</h3>
        <thead>
        <tr>
            <th scope="col">Helyezés</th>
            <th scope="col">Név</th>
            <th scope="col">Pontszám</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td data-label="Helyezés">#1</td>
            <td data-label="Név">Nyári Roland</td>
            <td data-label="Pontszám">1234</td>
        </tr>
        <tr>
            <td data-label="Helyezés">#2</td>
            <td data-label="Név">Hernádi Barnabás</td>
            <td data-label="Pontszám">123</td>
        </tr>
        <tr>
            <td data-label="Helyezés">#3</td>
            <td data-label="Név">Biliboc Bence</td>
            <td data-label="Pontszám">12</td>
        </tr>
        </tbody>
    </table>
@endsection