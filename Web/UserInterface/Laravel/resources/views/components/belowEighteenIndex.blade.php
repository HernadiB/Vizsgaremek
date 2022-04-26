<table class="data">
    <thead class="table-header">
    <tr>
        <th scope="col">Pontszámom</th>
        @can('hasTeam', auth()->user())
            <th scope="col">Csapatom neve</th>
            <th scope="col">Csapatom pontszáma</th>
        @endcan
        <th scope="col">Rangom</th>
    </tr>
    </thead>
    <tbody class="table-content">
    <tr>
        <td data-label="Pontszámom">{{auth()->user()->score}}</td>
        @can('hasTeam', auth()->user())
            <td data-label="Csapatom neve">{{auth()->user()->Team->name}}</td>
            <td data-label="Csapatom pontszáma">{{auth()->user()->Team->Score()}}</td>
        @endcan
        <td data-label="Szintem">{{auth()->user()->Level->name}}</td>
    </tr>
    </tbody>
</table>
@include('components.receivedRequests')
@can('hasRemainingTasks', auth()->user())
    <table class="tasksToDo">
        <thead class="table-header">
        <h3 class="title">Következő szinthez elvégezendő feladatok</h3>
        <tr>
            <th scope="col">Feladat sorszáma</th>
            <th scope="col">Feladat megnevezése</th>
            <th scope="col">Hozzáadás</th>
            <th scope="col">Feladat részletei</th>
        </tr>
        </thead>
        <tbody class="table-content">
        @foreach(auth()->user()->RemainingTasks as $remainingTask)
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
@endcan