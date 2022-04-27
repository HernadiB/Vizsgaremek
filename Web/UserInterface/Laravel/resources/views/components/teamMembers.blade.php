<div class="team">
    <h2 class="title">{{$team->name}}</h2>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h3 class="title">Vezető</h3>
            <a class="leader" href="#" onclick="GetUserByID({{$team->Leader->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="card border-0 w-50">
                   <div class="card-header text-center px-0 py-0">
                       <img src="{{asset($team->Leader->profile_picture)}}" class="card-img-top img-fluid" alt="{{$team->Leader->username}} profilképe">
                   </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$team->Leader->username}}</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-sm-12 my-auto">
            <p class="leaderDecription ">{{$team->description}}</p>
        </div>
    </div>
    <h3 class="title">Csapattagok</h3>
    <div class="row">
        @foreach($team->Members as $teamMember)
            <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                <a class="teamMember" href="#" onclick="GetUserByID({{$teamMember->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="card border-0 w-75 teamMemberCard">
                        <div class="card-header px-0 py-0">
                            <img src="{{asset($teamMember->profile_picture)}}" class="card-img-top img-fluid" alt="{{$teamMember->username}} profilképe">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$teamMember->username}}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>