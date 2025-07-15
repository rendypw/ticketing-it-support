<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {      
        if (auth()->guest()){
            return view('login');
        }    
        
    }
    public function login(Request $a)
    {
        $cek = $a->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);
        if (Auth::attempt($cek)) {
            $a->session()->regenerate();
            return redirect()->intended('/home');
        }               

        return back()->with('loginError','Username atau Password salah!');
    }
    public function logout(Request $a)
    {
        Auth::logout();
        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('login');
    }
}
