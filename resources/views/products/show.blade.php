@extends('layouts.app')

@section('content')
    
<form action="{{route('update_product',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group col-md-6 offset-3 mt-5">
        <input type="text" class="form-control mt-2" placeholder="name" name="name" value="{{$product->name,old('name')}}">
        @error('name')
            <h5 class="text-danger">{{$message}}</h5>
        @enderror
        <input type="text" class="form-control mt-2" placeholder="price" name="price" value="{{$product->price,old('price')}}">
        @error('price')
        <h5 class="text-danger">{{$message}}</h5>
        @enderror

        <input type="file" class="form-control mt-2" name="photo">

        <div class="form-group">
            <label for="my-select">categories</label>
            <select id="my-select" class="form-control" name="category_id">
                @foreach ($categories as $category)
            
                <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach
            </select>
        </div>
        <button class="btn btn-warning form-control">update</button>
    </div>
</form>

@endsection
