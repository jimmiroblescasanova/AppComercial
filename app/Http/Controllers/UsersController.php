<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Agents;
use App\Mail\UserActivated;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('update');
    }

    public function index()
    {
        return view('admin.clientes.index', [
            'users' => User::all(),
            'agents' => Agents::where([
                ['agent_id', '!=', '0'],
                ['active', 1],
            ])->pluck('name', 'id'),
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update($request->validated());
        $usuario->save();

        return back()->with('success', 'Datos modificados correctamente.');
    }

    public function activate($id)
    {
        $usuario = User::find($id);

        $usuario->active = !$usuario->active;

        if ($usuario->active) {
            Mail::to(env('MAIL_TO_ADMIN'))->send(new UserActivated($usuario));
        }

        $usuario->save();

        return redirect()->back()
            ->with('success', 'Cliente actualizado correctamente');
    }

    public function agentAssoc(Request $request)
    {
        $cliente = User::findOrFail($request->user);
        $agente = Agents::findOrFail($request->agente);

        $cliente->agent_id = $agente->agent_id;
        $cliente->save();

        return redirect()->route('admin.users');
    }

    public function changePrice(Request $request)
    {
        $cliente = User::findOrFail($request->user);

        $cliente->price_list = $request->precios;
        $cliente->save();

        return redirect()->back()->with('success', 'Lista de precios asignada correctamente.');
    }
}
