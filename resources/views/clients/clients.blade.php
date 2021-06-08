

@extends('layouts.app')

@section('content')  

 <div class="container mt-5">
     @if (session()->has('message'))
     <div class="alert alert-success" role="alert">
        {{session()->get('message')}}
    </div>
     @endif
     <div class="row">

         @foreach ($clients as $key=> $client)
         <ul class="list-group col-md-4 mt-2">
             <li class="list-group-item active">{{$client->id}}</li>
             <li class="list-group-item">name : {{$client->name}}</li>
             <li class="list-group-item">email : {{$client->email}}</li>
             <li class="list-group-item">phone : {{$client->phone}}</li>
             <li class="list-group-item">
                 {{-- old method --}}
                 {{-- <a href="details/{{$key}}">show details</a> --}}
         
                 {{-- pro method --}}
                 <a class="btn btn-secondary" href="{{route('details',['id'=>$client->id])}}">show details</a>
                 <a class="btn btn-warning" href="{{route('update-form',['id'=>$client->id])}}">update</a>

                 <form action="{{route('destroy',['id'=>$client->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                     <button class="btn btn-danger form-control mt-2">delete</button>
                 </form>
         
             </li>
         </ul> 
         @endforeach
     </div>
 </div>
    
    
@endsection
