@include('components.receivedRequests')
@can('hasTeam', auth()->user())
    <h3 class="title">Beérkezett feladatok felülvizsgálata</h3>
    @if(count($taskReviews) != 0)
        <table class="tasksToReview mt-5">
            <thead class="table-header">
                <tr>
                    <th scope="col">Felhasználónév</th>
                    <th scope="col">Feladat</th>
                    <th scope="col">Elfogad</th>
                    <th scope="col">Töröl</th>
                </tr>
            </thead>
            <tbody class="table-content">
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
        <div class="title">Nincs beérkezett feladat</div>
    @endif
@else
    @include('components.createTeam')
@endif