<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create(){
        return view('/auth/login');
    }

    public function store(Request $request){

        $user = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if(!Auth::attempt($user)){
            return back()->withErrors(['password' => 'There was an error authenticating your credentials'])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
