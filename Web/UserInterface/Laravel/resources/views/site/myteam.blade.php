@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    <table class="csapatom">
        <h3 class="text-center" style="margin-top: 100pt;">Csapatom</h3>
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
            <td data-label="Név">#1 feladat megnevezése</td>
            <td data-label="Pontszám">#1 feladat leírása</td>
        </tr>
        <tr>
            <td data-label="Helyezés">#2</td>
            <td data-label="Név">#2 feladat megnevezése</td>
            <td data-label="Pontszám">#2 feladat leírása</td>
        </tr>
        <tr>
            <td data-label="Helyezés">#3</td>
            <td data-label="Név">#3 feladat megnevezése</td>
            <td data-label="Pontszám">#3 feladat leírása</td>
        </tr>
        </tbody>
    </table>
@endsection