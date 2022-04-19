<link rel="stylesheet" href="{{asset("css/index_style.css")}}">
<script src="{{asset('js/index.js')}}"></script>
@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    @if(session("success"))
        <div id="alert" class="alert alert-success">{{session("success")}}</div>
    @endif
    @if(session("error"))
        <div class="alert alert-danger">{{session("error")}}</div>
    @endif
    @if(date_diff(date_create(session('user')->birthdate), date_create('now'))->y < 18)
    <table class="adatok">
        <thead>
            <tr>
                <th scope="col">Pontszámom</th>
                @if(session()->has('user.Team'))
                <th scope="col">Csapatom neve</th>
                <th scope="col">Csapatom pontszáma</th>
                @endif
                <th scope="col">Rendfokozatom</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td data-label="Pontszámom">{{session('user')->score}}</td>
            @if(session()->has('user.Team'))
                <td data-label="Csapatom neve">{{session('user')->Team->name}}</td>
                <td data-label="Csapatom pontszáma">{{session('user')->Team->Score()}}</td>
            @endif
            <td data-label="Rendfokozatom">{{\App\Models\Level::where('id', session('user')->level_id)->first()->name}}</td>
        </tr>
        </tbody>
    </table>
    @if(count(\App\Models\User::where('id', session('user.id'))->first()->ReceivedRequests) != 0)
        <table class="beerkezettjelolesek">
            <thead>
                <h3 class="text-center" id="cimsor">Beérkezett baráti jelölések</h3>
                <tr>
                    <th scope="col">Felhasználónév</th>
                    <th scope="col">Csapat tagja</th>
                    <th scope="col">Baráti jelölés</th>
                    <th scope="col">Törlés a listából</th>
                    <th scope="col">Profil</th>
                </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\User::where('id', session('user.id'))->first()->ReceivedRequests as $receivedRequest)
                <tr>
                    <td data-label="Felhasználónév">{{$receivedRequest->username}}</td>
                    <td data-label="Csapat tagja">{{\App\Models\Team::where('id', $receivedRequest->team_id)->first()->name}}</td>
                    {!! Form::open(['route' => 'inviteAccept', 'method' => 'post']) !!}
                    <td data-label="Baráti jelölés">
                        <button name="senderUserID" value="{{$receivedRequest->id}}" class="btn btn-success">Elfogad</button>
                    </td>
                    {!! Form::close() !!}
                    {!! Form::open(['route' => 'inviteReject', 'method' => 'post']) !!}
                    <td data-label="Törlés a listából">
                        <button name="senderUserID" value="{{$receivedRequest->id}}" class="btn btn-danger">Töröl</button>
                    </td>
                    {!! Form::close() !!}
                    <?php $receivedRequest['team_name'] = \App\Models\Team::where('id', $receivedRequest['team_id'])->first()->name ?? "-" ?>
                    <?php $receivedRequest['level_name'] = \App\Models\Level::where('id', $receivedRequest['level_id'])->first()->name ?? "-" ?>
                    <td data-label="Profil">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="ShowProfile({{$receivedRequest}})">Megtekint</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    @if(count(\App\Models\User::where('id', session('user.id'))->first()->RemainingTasks) != 0)
        <table class="elvegezendofeladatok">
            <thead>
                <h3 class="text-center">Következő szinthez elvégezendő feladatok</h3>
                <tr>
                    <th scope="col">Feladat sorszáma</th>
                    <th scope="col">Feladat megnevezése</th>
                    <th scope="col">Hozzáadás</th>
                    <th scope="col">Feladat részletei</th>
                </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\User::where('id', session('user.id'))->first()->RemainingTasks as $remainingTask)
                <tr>
                    <td data-label="Feladat sorszáma">{{$remainingTask->id}}</td>
                    <td data-label="Feladat megnevezése">{{$remainingTask->name}}</td>
                    {!! Form::open(['route' => 'taskAccept', 'method' => 'post']) !!}
                    <td data-label="Hozzáadás">
                        <button name="taskID" value="{{$remainingTask->id}}" class="btn btn-success">Hozzáadás</button>
                    </td>
                    {!! Form::close() !!}
                    {!! Form::open(['route' => 'taskView', 'method' => 'post']) !!}
                    <td data-label="Feladat részletei">
                        <button name="taskID" value="{{$remainingTask->id}}" class="btn btn-dark">Megtekint</button>
                    </td>
                    {!! Form::close() !!}
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-success mt-5 mb-5 m-auto" style="width:90%">Látogass el a <a href="{{route('site.mytasks')}}">feladataim</a> oldalra! Amint befejezted azokat, tovább léphetsz a következő szintre.</div>
    @endif
    @else
        @if(session()->has('user.Team'))
            <h2 class="text-center" style="margin-top: 100px">Beérkezett feladatok felülvizsgálata</h2>
            @if(count($taskReviews) != 0)
                <table class="tasksToReview mt-5">
                    <thead>
                    <tr>
                        <th scope="col">Felhasználónév</th>
                        <th scope="col">Feladat</th>
                        <th scope="col">Elfogad</th>
                        <th scope="col">Töröl</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taskReviews as $taskReview)
                        <tr>
                            <td data-label="Felhasználónév">{{\App\Models\User::where('id', $taskReview->user_id)->first()->username}}</td>
                            <td data-label="Feladat">{{\App\Models\Task::where('id', $taskReview->task_id)->first()->name}}</td>
                            {!! Form::open(['route' => 'taskConfirm', 'method' => 'post']) !!}
                                <td data-label="Elfogad">
                                    <button name="userAndTaskID" value="{{$taskReview->user_id . "." . $taskReview->task_id}}" class="btn btn-success">Elfogad</button>
                                </td>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'taskReject', 'method' => 'post']) !!}
                                <td data-label="Töröl">
                                    <button name="userAndTaskID" value="{{$taskReview->user_id . "." . $taskReview->task_id}}" class="btn btn-danger">Töröl</button>
                                </td>
                            {!! Form::close() !!}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div>Nincs beérkezett feladat</div>
            @endif
        @else
            @include('site.teammake')
        @endif
    @endif
    @include('site.modal')
@endsection