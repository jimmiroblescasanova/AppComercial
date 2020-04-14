<?php

namespace App\Http\Controllers;

use App\Agents;
use App\admAgentes;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAgentRequest;
use App\Http\Requests\UpdateAgentRequest;

class AdminAgentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.agents.index', [
            'agents' => Agents::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.agents.create', [
            'agentes' => admAgentes::pluck('CNOMBREAGENTE', 'CIDAGENTE')
        ]);
    }

    public function store(CreateAgentRequest $request)
    {

        $agent = new Agents($request->all());
        $agent->save();

        return redirect()->route('admin.agents.index')
            ->with('success', 'Agente creado correctamente');
    }

    public function edit($id)
    {
        return view('admin.agents.edit', [
            'agente' => Agents::find($id),
            'agentes' => admAgentes::pluck('CNOMBREAGENTE', 'CIDAGENTE'),
        ]);
    }

    public function update(UpdateAgentRequest $request, $id)
    {
        $agente = Agents::find($id);

        $agente->update($request->validated());
        $agente->save();

        return redirect()->route('admin.agents.index')
            ->with('success', 'Agente actualizado correctamente.');
    }

    public function password($id)
    {
        return view('admin.agents.password', compact('id'));
    }

    public function change_password(Request $request, $id)
    {
        $validData = $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $agente = Agents::findOrFail($id);
        $agente->password = $validData['password'];
        $agente->update();

        return redirect()->route('admin.agents.index')
            ->with('success', 'Contraseña cambiada correctamente');
    }

    public function updateStatus($id)
    {
        $agente = Agents::find($id);
        $agente->active = !$agente->active;
        $agente->save();

        return redirect()->route('admin.agents.index')
            ->with('success', 'Agente actualizado correctamente');
    }
}
