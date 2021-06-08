@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        @foreach ($products  as $product)
          
               
        <ul class="list-group mt-5 col-md-4">
            <li class="list-group-item active"> id  : {{$product->id}}</li>
            <li class="list-group-item">name : {{$product->name}}</li>
            <li class="list-group-item">price : {{$product->price}}</li>
            <li class="list-group-item">category name  : {{$product->category->name}}</li>
            <li class="list-group-item">username  : {{$product->user->name}}</li>
            @if (Auth::user()->id==$product->user->id)
                <li class="list-group-item">
                    <form action="{{route('delete_product',['id'=>$product->id])}}" method="post">
                        @csrf
                    @method('DELETE')
                        <button class="btn btn-danger form-control">delete</button>
                    </form>
                </li>
                <li class="list-group-item">
                    <a href="{{route('show_product',['id'=>$product->id])}}" class="btn btn-warning form-control">update</a>
                </li>
            @endif
            <li class="list-group-item">
                  <img style="width: 200px;height:200px" src="{{asset('storage/'.$product->image)}}" alt="">
            </li>
        </ul>

     
        @endforeach

    </div>
</div>
@endsection
