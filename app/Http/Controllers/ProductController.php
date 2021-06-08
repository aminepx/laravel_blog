<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


  

    
    public function index()
    {
        $products=Product::where('user_id',Auth::user()->id)->get();
        return view('products.index',['products'=>$products]);
    }

    public function create()
    {
        $categories=Category::all();
        return view('products.create',['categories'=>$categories]);
    }

    public function store(ProductRequest $req)
    {

        $product=new Product();
        $product->name=$req->name;
        $product->price=$req->price;
        $product->category_id=$req->category_id;
        
        if($req->hasFile('photo'))
        {
            $path=$req->photo->store('product_images');
        }
        $product->image=$path;
        $product->user_id=Auth::user()->id;
        $product->save();
        return redirect('products');
    }

    public function destroy($id)
    {
       $product=Product::find($id);
       $product->delete();
       return redirect('products');
    }

    public function show($id)
    {
        $product=Product::find($id);
        $categories=Category::all();
        return view('products.show',['product'=>$product,'categories'=>$categories]);
    }

    public function update(ProductRequest $req,$id)
    {
        $product=Product::find($id);
        $product->name=$req->name;
        $product->price=$req->price;
        $product->category_id=$req->category_id;
        if($req->hasFile('photo'))
        {
            $path=$req->photo->store('product_images');
        }
        $product->image=$path;
        $product->save();
        return redirect('products');
    }


}
