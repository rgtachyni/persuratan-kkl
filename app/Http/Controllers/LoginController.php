<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    public function loginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        // dd(Hash::make($request->password));

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credetials = $request->only('username', 'password');

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // dd($credetials);
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['loginError' => 'username atau password salah']);
        }
    }
}
