<link rel="stylesheet" href="{{asset("css/index_style.css")}}">
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    @if(session("success"))
        <div class="alert alert-success mt-3">{{session("success")}}</div>
    @endif
    @if(session("error"))
        <div class="alert alert-danger mt-3">{{session("error")}}</div>
    @endif

    <table class="adatok">
        <thead>
            <tr>
                <th scope="col">Pontszámom</th>
                <th scope="col">Csapatom neve</th>
                <th scope="col">Csapatom pontszáma</th>
                <th scope="col">Rendfokozatom</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td data-label="Pontszámom">1234</td>
            <td data-label="Csapatom neve">Csapat1</td>
            <td data-label="Csapatom pontszáma">1234</td>
            <td data-label="Rendfokozatom">Altiszt</td>
        </tr>
        </tbody>
    </table>

    <table class="beerkezettjelolesek">
        <thead>
            <h3 class="text-center">Beérkezett baráti jelőlések</h3>
            <tr>
                <th scope="col">Felhasználónév</th>
                <th scope="col">Csapat tagja</th>
                <th scope="col">Baráti jelölés</th>
                <th scope="col">Törlés a listából</th>
                <th scope="col">Profil</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Felhasználónév">Nyári Roland</td>
                <td data-label="Csapat tagja">Csapat1</td>
                <td data-label="Baráti jelölés">
                    <button class="btn btn-success">Elfogad</button>
                </td>
                <td data-label="Törlés a listából">
                    <button class="btn btn-danger">Töröl</button>
                </td>
                <td data-label="Profil">
                    <button class="btn btn-dark">Megtekint</button>
                </td>
            </tr>
            <tr>
                <td data-label="Felhasználónév">Biliboc Bence</td>
                <td data-label="Csapat tagja">Csapat2</td>
                <td data-label="Baráti jelölés">
                    <button class="btn btn-success">Elfogad</button>
                </td>
                <td data-label="Törlés a listából">
                    <button class="btn btn-danger">Töröl</button>
                </td>
                <td data-label="Profil">
                    <button class="btn btn-dark">Megtekint</button>
                </td>
            </tr>
            <tr>
                <td data-label="Felhasználónév">Hernádi Barnabás</td>
                <td data-label="Csapat tagja">Csapat3</td>
                <td data-label="Baráti jelölés">
                    <button class="btn btn-success">Elfogad</button>
                </td>
                <td data-label="Törlés a listából">
                    <button class="btn btn-danger">Töröl</button>
                </td>
                <td data-label="Profil">
                    <button class="btn btn-dark">Megtekint</button>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="beerkezettfeladatok">
        <thead>
            <h3 class="text-center">Következő szinthez elvégezendő feladatok</h3>
            <tr>
                <th scope="col">Feladat sorszáma</th>
                <th scope="col">Feladat megnevezése</th>
                <th scope="col">Feladat leírása</th>
                <th scope="col">Hozzáadás</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Feladat sorszáma">#1</td>
                <td data-label="Feladat megnevezése">#1 feladat megnevezése</td>
                <td data-label="Feladat leírása">#1 feladat leírása</td>
                <td data-label="Hozzáadás">
                    <button class="btn btn-success">Hozzáadás</button>
                </td>
            </tr>
            <tr>
                <td data-label="Feladat sorszáma">#2</td>
                <td data-label="Feladat megnevezése">#2 feladat megnevezése</td>
                <td data-label="Feladat leírása">#2 feladat leírása</td>
                <td data-label="Hozzáadás">
                    <button class="btn btn-success">Hozzáadás</button>
                </td>
            </tr>
            <tr>
                <td data-label="Feladat sorszáma">#3</td>
                <td data-label="Feladat megnevezése">#3 feladat megnevezése</td>
                <td data-label="Feladat leírása">#3 feladat leírása</td>
                <td data-label="Hozzáadás">
                    <button class="btn btn-success">Hozzáadás</button>
                </td>
            </tr>
            <tr>
                <td data-label="Feladat sorszáma">#4</td>
                <td data-label="Feladat megnevezése">#4 feladat megnevezése</td>
                <td data-label="Feladat leírása">#4 feladat leírása</td>
                <td data-label="Hozzáadás">
                    <button class="btn btn-success">Hozzáadás</button>
                </td>
            </tr>
            <tr>
                <td data-label="Feladat sorszáma">#5</td>
                <td data-label="Feladat megnevezése">#5 feladat megnevezése</td>
                <td data-label="Feladat leírása">#5 feladat leírása</td>
                <td data-label="Hozzáadás">
                    <button class="btn btn-success">Hozzáadás</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection