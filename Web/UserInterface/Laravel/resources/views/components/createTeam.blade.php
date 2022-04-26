<link rel="stylesheet" href="{{asset('css/createteam_style.css')}}">
<div class="createTeam">
    <h3 class="title">Mivel elmúltál 18 éves, sajnos véget ért számodra ez a kaland. Ha folytatni szeretnéd, alapíts egy csapatot!</h3>
    <div class="form-section">
        <form action="{{route('teamCreate')}}" method="post" role="form" class="form-inline">
            @csrf
            <h4 class="createTeamTitle">Csapat alapítás</h4>
            <div class="row">
                <label for="name" class="col-lg-4 col-form-label">Csapat neve</label>
                <div class="col-lg-8">
                    <input type="text" name="name" class="form-control input" placeholder="BeastProgrammer">
                </div>
            </div>
            <div class="row">
                <label for="description" class="col-lg-4 col-form-label">Leírás</label>
                <div class="col-lg-8">
                    <input type="text" name="description" class="form-control input" placeholder="...">
                </div>
            </div>
{{--            <div class="csapattag row">--}}
{{--                <label for="csapattag" class="col-lg-4 col-form-label">Csapattagok</label>--}}
{{--                <div class="col-lg-8">--}}
{{--                    <input type="text" name="tag" class="form-control input" placeholder="Alfréd Mihály">--}}
{{--                </div>--}}
{{--            </div>--}}

                <table class="table teamTable">
                    <thead class="table-header">
                        <tr>
                            <th scope="col">Név</th>
                            <th scope="col">Profil</th>
                            <th scope="col">Kiválaszt</th>
                        </tr>
                    </thead>
                    <tbody class="table-content">
                    @foreach($usersWithoutTeam as $user)
                        <tr>
                            <td data-label="Név">{{$user->username}}</td>
                            <td data-label="Profil">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="GetUserByID({{$user->id}})">Megtekint</button>
                            </td>
                            <td data-label="Kiválaszt">
                                <input name="users[]" value="{{$user->id}}" type="checkbox">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <button class="btn btn-dark foundation">Alapítás</button>
        </form>
    </div>
</div>