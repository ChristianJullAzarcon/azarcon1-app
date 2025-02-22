<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Services\UserServices;


Route::get('/', function () {
    return view('welcome');
});

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

