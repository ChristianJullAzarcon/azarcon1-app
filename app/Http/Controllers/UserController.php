<?php

namespace App\Http\Controllers;

use App\Providers\UserServiceProvider;
use Illuminate\Http\Request;
use App\Services\UserServices;

class UserController extends Controller
{
    public function index(UserServices $UserService){
        return view('users.index', ['users' => $UserService->listUsers()]);
    }
     public function first(UserServices $UserServices){
        return collect($UserServices->listUsers())->first();
     }
     public function show(UserServices $UserService, $id){
        $user = collect($UserService->listUsers())->filter(function($item) use ($id){
            return $item['id'] == $id;
        })->first();

        return $user;   
    }
}
