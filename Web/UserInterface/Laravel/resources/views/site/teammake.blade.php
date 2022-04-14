<link rel="stylesheet" href="{{asset("css/teammake_style.css")}}">
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

    <div class="csapatalap">
        <h3 id="h3">Mivel elmúltál 18 éves, sajnos véget ért számodra ez a kaland. Ha folytatni szeretnéd, alapíts egy csapatot</h3>

        <div class="form-section">
            <form action="" method="" role="form" class="form-inline">
                <h4 id="h4">Csapat alapítás</h4>
                <div class="nev row">
                    <label for="nev" class="col-lg-4 col-form-label">Csapat neve</label>
                    <div class="col-lg-8">
                        <input type="text" name="nev" class="form-control input" placeholder="BeastProgrammer">
                    </div>
                </div>
                <div class="csapattag row">
                    <label for="csapattag" class="col-lg-4 col-form-label">Csapattagok</label>
                    <div class="col-lg-8">
                        <input type="text" name="tag" class="form-control input" placeholder="Alfréd Mihály">
                    </div>
                </div>

                <div class="table">
                    <table class="csapattabla">
                        <thead>
                        <tr>
                            <th scope="col">Név</th>
                            <th scope="col">Profil</th>
                            <th scope="col">Kiválaszt</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td data-label="Név">Biliboc Bence</td>
                            <td data-label="Profil">
                                <button class="btn btn-primary">Megtekint</button>
                            </td>
                            <td data-label="Kiválaszt">
                                <input type="checkbox">
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Név">Hernádi Barnabás</td>
                            <td data-label="Profil">
                                <button class="btn btn-primary">Megtekint</button>
                            </td>
                            <td data-label="Kiválaszt">
                                <input type="checkbox">
                            </td>
                        </tr>

                        <tr>
                            <td data-label="Név">Nyári Roland</td>
                            <td data-label="Profil">
                                <button class="btn btn-primary">Megtekint</button>
                            </td>
                            <td data-label="Kiválaszt">
                                <input type="checkbox">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                    <button class="btn btn-dark alapitas">Alapítás</button>
            </form>
        </div>
    </div>

@endsection