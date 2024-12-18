<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admin/dashboard');
        }
 
        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
