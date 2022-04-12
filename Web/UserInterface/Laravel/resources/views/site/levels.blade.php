@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    <table class="szintek">
        <h3 id="cimsor" class="text-center" >Szintek - feladatok</h3>
        <thead>
        <tr>
            <th scope="col">Szint neve</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Feladat leírása</th>
            <th scope="col">Kapható pontok</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td data-label="Helyezés">Tisztek</td>
            <td data-label="Név">#1 feladat megnevezése</td>
            <td data-label="Leírás">#1 feladat leírása</td>
            <td data-label="Pontszám">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Tisztek</td>
            <td data-label="Név">#2 feladat megnevezése</td>
            <td data-label="Leírás">#2 feladat leírása</td>
            <td data-label="Pontszám">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Tisztek</td>
            <td data-label="Név">#3 feladat megnevezése</td>
            <td data-label="Pontszám">#3 feladat leírása</td>
            <td data-label="Leírás">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Altiszt</td>
            <td data-label="Név">#1 feladat megnevezése</td>
            <td data-label="Pontszám">#1 feladat leírása</td>
            <td data-label="Leírás">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Altiszt</td>
            <td data-label="Név">#2 feladat megnevezése</td>
            <td data-label="Pontszám">#2 feladat leírása</td>
            <td data-label="Leírás">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Altiszt</td>
            <td data-label="Név">#3 feladat megnevezése</td>
            <td data-label="Pontszám">#3 feladat leírása</td>
            <td data-label="Leírás">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Zászlós</td>
            <td data-label="Név">#1 feladat megnevezése</td>
            <td data-label="Pontszám">#1 feladat leírása</td>
            <td data-label="Leírás">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Zászlós</td>
            <td data-label="Név">#2 feladat megnevezése</td>
            <td data-label="Pontszám">#2 feladat leírása</td>
            <td data-label="Leírás">32</td>
        </tr>
        <tr>
            <td data-label="Helyezés">Zászlós</td>
            <td data-label="Név">#3 feladat megnevezése</td>
            <td data-label="Pontszám">#3 feladat leírása</td>
            <td data-label="Leírás">32</td>
        </tr>
        </tbody>
    </table>
@endsection