@extends('layouts.main')
@section('title')
    {{$title}}
@endsection
@include('site.nav')
@section('content')
    @if(\App\Models\User::where('id', session('user.id'))->first()->Team != null)
        <h1 class="text-center" id="cimsor">Csapatom</h1>
        <div class="row mt-3">
            <div class="col-3 text-center">
                <h3>Vezető</h3>
                <div class="card">
                    <img src="https://picsum.photos/200" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$teamLeader->username}}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <p class="mx-5 my-5"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque deserunt dolorem doloremque dolores eaque fuga iusto, modi placeat quia quidem saepe sint, temporibus, tenetur vel velit. Id non praesentium repudiandae.</span><span>Ab aperiam atque exercitationem maiores nam, quibusdam quod reprehenderit sapiente sequi voluptate. Aliquam autem cum deserunt distinctio harum labore, neque non nostrum perferendis quam quidem, recusandae repellat sequi tenetur vel?</span><span>Ad aliquam assumenda beatae cupiditate delectus distinctio dolore eos facilis id, illum minus, nobis nostrum odio perferendis porro recusandae tenetur voluptatum. Aliquam aspernatur eius nesciunt nisi numquam quae quasi quos!</span><span>At atque autem delectus esse et facilis fugit nemo neque numquam obcaecati quibusdam quis, quo reiciendis sit sunt velit voluptate! Aperiam debitis dignissimos facere modi pariatur quae quod, veniam voluptatum?</span><span>Aliquam, commodi consequatur, debitis dolores, ducimus fugit maiores nesciunt numquam obcaecati temporibus velit vitae voluptas voluptatum? Accusantium ad animi dolores eveniet ipsa, mollitia, officiis praesentium quis recusandae, reiciendis sequi similique.</span>
                </p>
            </div>
        </div>
        <h3 class="my-4 text-center">Csapattagok</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($teamMembers as $teamMember)
                <div class="col">
                    <a style="text-decoration: none;color: black" href="www.google.com">
                    <div class="card">
                        <img src="https://picsum.photos/200" class="card-img-top" alt="Pic not found">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$teamMember->username}}</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
        @if(\App\Models\User::where('id', session('user.id'))->first()->role == "admin")
            @include('site.adminteammate')
        @endif
    @else
        <h1 class="text-center" style="margin-top: 100px">Még nincs csapatod :(</h1>
    @endif
@endsection