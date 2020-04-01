<?php

namespace App\Http\Controllers;

use App\User;
use App\Agents;
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
        return view('admin.clientes.index', [
            'users' => User::all(),
            'agents' => Agents::pluck('name', 'agent_id'),
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

        //        toast('Success Toast','success')->autoClose(5000);
        return redirect()->back()
            ->with('success', 'Cliente actualizado correctamente');
    }

    public function agentAssoc(Request $request)
    {
        $cliente = User::find($request->user);

        $cliente->agent_id = $request->agente;
        $cliente->save();

        return redirect()->route('admin.users');
    }
}
