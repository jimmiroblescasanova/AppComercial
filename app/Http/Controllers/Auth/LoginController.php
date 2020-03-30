<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function validateLogin()
    {
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string',
        ]);

        $credentials['active'] = true;

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/clientes');
        }

        return back()->with('info', 'Credenciales incorrectas o usuario inactivo.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
