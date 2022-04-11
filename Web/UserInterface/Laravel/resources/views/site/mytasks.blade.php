@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')


    <table class="feladataim">
        <h3 class="text-center" style="margin-top: 100pt;">Aktuális feladataim</h3>
        <thead>
        <tr>
            <th scope="col">Feladat sorszáma</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Feladat</th>
            <th scope="col">Státusz</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td data-label="Feladat sorszáma">#1</td>
            <td data-label="Feladat megnevezése">#1 feladat megnevezése</td>
            <td data-label="Feladat">
                <button class="btn btn-dark">Megtekint</button>
            </td>
            <td data-label="Státusz">&#10004</td>
        </tr>
        <tr>
            <td data-label="Feladat sorszáma">#2</td>
            <td data-label="Feladat megnevezése">#2 feladat megnevezése</td>
            <td data-label="Feladat">
                <button class="btn btn-dark">Megtekint</button>
            </td>
            <td data-label="Státusz">&#x274C;</td>
        </tr>
        <tr>
            <td data-label="Feladat sorszáma">#3</td>
            <td data-label="Feladat megnevezése">#3 feladat megnevezése</td>
            <td data-label="Feladat">
                <button class="btn btn-dark">Megtekint</button>
            </td>
            <td data-label="Státusz">&#10004</td>
        </tr>
        </tbody>
    </table>
@endsection