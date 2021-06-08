@extends('layouts.app')

@section('content')

   
<form action="{{route('update-user',['id'=>$client->id])}}" method="post">
    @method("put")
    @csrf
    <div class="form-group col-md-6 offset-3 mt-5">
        <input name="name" type="text" class="form-control mt-2" placeholder="name" value="{{$client->name}}">
        <input name="email" type="text" class="form-control mt-2" placeholder="email" value="{{$client->email}}">
        <input name="phone" type="text" class="form-control mt-2" placeholder="phone" value="{{$client->phone}}">
        <button class="btn btn-warning form-control mt-2">update</button>
    </div>
</form>
    
@endsection