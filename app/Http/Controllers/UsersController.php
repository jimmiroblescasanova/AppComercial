<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\UserActivated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('clientes.index', [
            'users' => User::all(),
        ]);
    }

    public function activate($id)
    {
        $usuario = User::find($id);

        $usuario->active = !$usuario->active;

        if ($usuario->active) {
            Mail::to(env('MAIL_TO_ADMIN'))->send(new UserActivated($usuario));
        }

        $usuario->save();


        return redirect()->back();
    }
}
