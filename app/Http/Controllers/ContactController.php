<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Agents;
use App\Mail\MessageReceived;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function send()
    {
        $mensaje = request()->validate([
            'subject' => 'required|min:5|string',
            'message' => 'required|min:15|string'
        ]);

        $mensaje['name'] = Auth::user()->name;

        $agente = Agents::firstWhere('agent_id', Auth::user()->agent_id);

        Mail::to($agente->email)->send(new MessageReceived($mensaje));

        return redirect()->route('clients.home')
            ->with('success', 'Tu correo se ha enviado correctamente');
    }
}
