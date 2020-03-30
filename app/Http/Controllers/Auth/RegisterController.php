<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:6',
            'rfc' => 'required|string|min:12|max:13|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:6',
        ]);

        $cliente = new User($validated);
        $cliente->save();

        Mail::to(env('MAIL_TO_ADMIN'))->send(new UserRegistered($cliente));

        return redirect('/')
            ->with('info', 'Se ha registrado correctamente, recibirás un correo de confirmación cuando tu cuenta haya sido activada.');
    }
}
