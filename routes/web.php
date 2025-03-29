<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\UserController;
use App\Services\ProductService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\TaskService;


Route::get('/', function () {
    return view('welcome', ['name' => 'azarcon1-app']);
});

Route::get('/users',[UserController::class,'index']);

Route::resource('products', productController::class);

Route::get('/test-container',function(Request $request){
    $input = $request->input('key');
    return $input;
});

Route::get('/test-provider',function(UserServices $UserService){
   return $UserService->listUsers();
});

Route::get('/test-users',[UserController::class,'index']);

Route::get('/test-facade',function(UserServices $UserServices){
    return Response::json($UserServices->listUsers());
});

Route::get('/post/{post}/comment/{comment}', function(string $postId, string $comment){
       return "Post ID : " . $postId . " - Comment : " . $comment;
});

Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id','[0-9]+');

//
Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search','.*');

//Name Routes or Route Alias
Route::get('/test/route', function () {
    return route('test-route');
})->name('test-route');

//Route -> Middleware Group
 
Route::middleware(['user-middleware'])->group(function() {
    Route::get('route-middleware-group/first',function(Request $request){
        echo 'first';
    });
    Route::get('route-middleware-group/second',function(Request $request){
        echo 'second';
    });
});

//Route -> Controller
Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
    Route::get('/users/first','first');
    Route::get('/users/{id}','show');
});

//CSRF
Route::get('/token', function (Request $request){
    return view('token');
});

Route::post('/token', function (Request $request){
    return $request->all();
});

//Controller -> Middleware
//Route::get('/users',[UserController::class,'index'])->middleware('user-middleware');

//Resource
//Route::resource('products',productController::class);

//VIEW WITH DATA
Route::get('/product-list',function(ProductService $productService){
    $data['products'] = $productService->listProducts();
    return view('products.list',$data);
});