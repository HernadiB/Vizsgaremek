<link rel="stylesheet" href="{{asset("css/adminteammate_style.css")}}">
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    <h1 id="h1">Csapattag felvétel</h1>

   <div class="teammate">
       <div class="form-section">
           <form action="" method="" role="form" class="form-inline">
               <div class="nev row">
                   <label for="nev" class="col-lg-4 col-form-label">Felhasználó neve</label>
                   <div class="col-lg-8">
                       <select class="form-select" name="csapattag" >
                           <option value="Alfréd Mihály">Alfréd Mihály</option>
                       </select>
                   </div>
               </div>
               <div class="csapatom row" id="melle">
                   <label for="csapatom" class="col-lg-4 col-form-label">Csapatom</label>
                   <span>
                   <label for="csapatom" class="rlb">Csapat1</label>
                       </span>
               </div>

               <button class="btn btn-dark felvetel">Felvétel</button>
           </form>
       </div>
   </div>
@endsection