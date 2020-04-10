<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\CreateUserRequest;
use App\User;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(CreateUserRequest $request)
    {
        $cliente = new User($request->validated());
        $cliente->save();

        Mail::to(env('MAIL_TO_ADMIN'))->send(new UserRegistered($cliente));

        return redirect('/')
            ->with('info', 'Se ha registrado correctamente, recibirás un correo de confirmación cuando tu cuenta haya sido activada.');
    }
}
