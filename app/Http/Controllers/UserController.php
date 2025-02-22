<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;

class UserController extends Controller
{
    public function index(UserServices $UserService){
        return $UserService->listUsers();
    }
}
