@can('hasReceivedRequests', auth()->user())
    <h3 class="text-center title">Beérkezett baráti jelölések</h3>
{{--    @if(count($receivedRequest) != 0)--}}
        <table class="recievedRequests">
            <thead class="table-header">
                <tr>
                    <th scope="col">Felhasználónév</th>
                    <th scope="col">Csapat tagja</th>
                    <th scope="col">Baráti jelölés</th>
                    <th scope="col">Törlés a listából</th>
                    <th scope="col">Profil</th>
                </tr>
            </thead>
            <tbody class="table-content">
                @foreach(auth()->user()->ReceivedRequests as $receivedRequest)
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
                        <td data-label="Profil">
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="GetUserByID({{$receivedRequest->id}})">Megtekint</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
{{--    @else--}}
{{--        <div class="title">Nincs beérkezett baráti kérelmed.</div>--}}
{{--    @endif--}}

@endcan