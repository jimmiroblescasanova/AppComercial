<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('guest', ['only' => 'login']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors(['email', 'El correo no existe']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
