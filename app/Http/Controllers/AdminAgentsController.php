<?php

namespace App\Http\Controllers;

use App\Agents;
use App\admAgentes;
use App\Http\Requests\CreateAgentRequest;
use Illuminate\Http\Request;

class AdminAgentsController extends Controller
{
    //
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
}
