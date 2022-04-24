<div id="csapat">
    <h1 class="text-center" id="cimsor">{{$team->name}}</h1>
    <div class="row mt-3">
        <div class="col-3 text-center">
            <h3>Vezető</h3>
            <a style="text-decoration: none;color: black" href="#" onclick="GetUserByID({{$team->Leader->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="card">
                    <img src="{{asset($team->Leader->profile_picture)}}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$team->Leader->username}}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-9">
            <p>{{$team->description}}</p>
        </div>
    </div>
    <h3 class="my-4 text-center">Csapattagok</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($team->Members as $teamMember)
            <div class="col">
                <a style="text-decoration: none;color: black" href="#" onclick="GetUserByID({{$teamMember->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="card">
                        <img src="{{asset($teamMember->profile_picture)}}" class="card-img-top" alt="Pic not found">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$teamMember->username}}</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>