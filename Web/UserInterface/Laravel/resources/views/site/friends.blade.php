@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')

    <table class="barataim">
        <h3 class="text-center" style="margin-top: 100pt;">Barátaim</h3>
        <thead>
            <tr>
                <th scope="col">Helyezés</th>
                <th scope="col">Név</th>
                <th scope="col">Pontszám</th>
                <th scope="col">Barát törlése</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Helyezés">#1</td>
                <td data-label="Név">#1 feladat megnevezése</td>
                <td data-label="Pontszám">#1 feladat leírása</td>
                <td data-label="Barát törlése">
                    <button class="btn btn-danger">Törlés</button>
                </td>
            </tr>
            <tr>
                <td data-label="Helyezés">#2</td>
                <td data-label="Név">#2 feladat megnevezése</td>
                <td data-label="Pontszám">#2 feladat leírása</td>
                <td data-label="Barát törlése">
                    <button class="btn btn-danger">Törlés</button>
                </td>
            </tr>
            <tr>
                <td data-label="Helyezés">#3</td>
                <td data-label="Név">#3 feladat megnevezése</td>
                <td data-label="Pontszám">#3 feladat leírása</td>
                <td data-label="Barát törlése">
                    <button class="btn btn-danger">Törlés</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection