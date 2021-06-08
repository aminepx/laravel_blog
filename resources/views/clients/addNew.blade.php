@extends('layouts.app')

@section('content')
    
<form action="{{route('add')}}" method="post">
    @csrf
    <div class="form-group col-md-6 offset-3 mt-5">
        <input name="name" type="text" class="form-control mt-2" placeholder="name">
        @error('name')
        <h3 class="text-danger">{{$message}}</h3>  
        @enderror
        <input name="email" type="text" class="form-control mt-2" placeholder="email">
        @error('email')
          <h3 class="text-danger">{{$message}}</h3>  
        @enderror
        <input name="phone" type="text" class="form-control mt-2" placeholder="phone">
        @error('phone')
        <h3 class="text-danger">{{$message}}</h3>  
        @enderror
        <button class="btn btn-success form-control mt-2">add new</button>
    </div>
</form>

@endsection