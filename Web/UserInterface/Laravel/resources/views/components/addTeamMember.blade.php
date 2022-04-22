<div id="csapatfelvetel" class="d-none">
    <h1 id="h1">Új csapattag felvétele</h1>
    <div class="teammate">
        <div class="form-section">
            <form action="{{route('memberAdd')}}" method="post" role="form" class="form-inline">
                @csrf
                <div class="nev row">
                    <label for="newTeamMember" class="col-lg-4 col-form-label">Felhasználó neve</label>
                    <div class="col-lg-8">
                        <select class="form-select" name="newTeamMember">
                            @foreach($usersWithoutTeam as $user)
                                <option value="{{$user->id}}">{{$user->username . " (" . $user->full_name . ")"}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-dark felvetel">Felvétel</button>
            </form>
        </div>
    </div>
</div>