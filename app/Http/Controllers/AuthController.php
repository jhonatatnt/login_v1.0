<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function index(){
        if (auth()->check()) {
            return redirect()->route('financeiro'); // ou a rota desejada
        }

        return view('login'); // ou o nome da view de login
    }

    public function loginAttempt(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('financeiro');
        }
        else{
            return back()->withInput()->with('status','Login Inválido!');
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


    
}
