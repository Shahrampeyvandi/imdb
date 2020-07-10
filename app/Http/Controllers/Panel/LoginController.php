<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login()
    {
        return view('Panel.Login');
    }

    public function Verify(Request $request)
    {
        DB::table('admins')->insert([
            'first_name' => 'user',
            'last_name' => 'user',
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'level' => 'admin'
        ]);
    }


}
