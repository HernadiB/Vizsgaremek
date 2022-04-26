@if($errors->any)
    @foreach($errors->all() as $e)
        <div class="alert alert-danger mb-2">{{$e}}</div>
    @endforeach
@endif