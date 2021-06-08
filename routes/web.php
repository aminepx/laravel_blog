<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/message',function(){

    $message='i am variable message';

      return view("message",['data'=>$message]);
});

Route::get('/courses',function(){

    $courses=['reactjs','javascript','bootstrap'];
    return view('courses',['data'=>$courses]);

});

// route with params
Route::get('/home/{id}',function($id){


     return view('index',['my_id'=>$id]);
});



Route::get('/users',function(){

$users=[
  "1"=>'user 1',
  "2"=>'user 2',
  "3"=>'user 3',     //display all users in users view
  "4"=>'user 4'
];
    return view('users.users',['users'=>$users]);
});
                                     //3
Route::get('/details/{id}',function($id){

    $users=[
      "1"=>'user 1',
      "2"=>'user 2',    //display one user in details view
      "3"=>'user 3',
      "4"=>'user 4'
    ];
        return view('users.details',['user'=>$users[$id]]);
    
});

//////matrix table


// 1 create clients view with route
// 2 create details view with route
//folders clients(clients.blade.php,details.blade.php)

// Route::get('clients',[ClientController::class,'index'])->name('clients');

// Route::get('details/{id}',[ClientController::class,'details'])->name('details');

// Route::get('add-new-form',[ClientController::class,'create'])->name('add-new-form');
// Route::post('add',[ClientController::class,'store'])->name('add');

// Route::get('update-form/{id}',[ClientController::class,'show'])->name('update-form');
// Route::put('update-user/{id}',[ClientController::class,'update'])->name('update-user');


// Route::delete('destroy/{id}',[ClientController::class,'deleteOneUser'])->name('destroy');



// products routes

Route::group(['middleware'=>'auth'],function(){

  
  // Route::get('products',[ProductController::class,'index'])->name('products');

  Route::get('products','ProductController@index')->name('products');

  Route::get('add-new',[ProductController::class,'create'])->name('add-new');
  
  Route::post('store_product',[ProductController::class,'store'])->name('store_product');
  
  Route::delete('delete_product/{id}',[ProductController::class,'destroy'])->name('delete_product');
  
  
  Route::get('show_product/{id}',[ProductController::class,'show'])->name('show_product');
  
  
  Route::put('update_product/{id}',[ProductController::class,'update'])->name('update_product');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
