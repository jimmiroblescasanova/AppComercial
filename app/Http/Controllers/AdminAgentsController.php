<?php

namespace App\Http\Controllers;

use App\Agents;
use App\admAgentes;
use Illuminate\Http\Request;

class AdminAgentsController extends Controller
{
    //
    public function index()
    {
        return view('admin.agents.index', [
            'agents' => Agents::all(),
        ]);
    }

    public function create()
    {
        return view('admin.agents.create', [
            'agentes' => admAgentes::pluck('CNOMBREAGENTE', 'CIDAGENTE')
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:agents,email',
            'password' => 'required|string|min:6|confirmed',
            'id_comercial' => 'unique:Agents,id_comercial',
        ]);

        $agent = new Agents($data);
        $agent->save();

        return redirect()->route('admin.agents.index')
            ->with('success', 'Agente creado correctamente');
    }
}
