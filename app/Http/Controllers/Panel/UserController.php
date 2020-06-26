<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function List()
    {
        $users = User::all();
        return view('Panel.Users.Lists',compact('users'));
    }
}
