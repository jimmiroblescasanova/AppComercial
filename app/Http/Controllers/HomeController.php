<?php

namespace App\Http\Controllers;

use App\Documentos;
use App\Agentes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $agentes = Agentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');
        //return dd($agentes);

        return view('home', [
            'agentes' => $agentes,
        ]);
    }

    public function reporteComisiones(Request $request)
    {
        $agente = Agentes::firstWhere('CIDAGENTE', $request->id_agente);

        $documentos = Documentos::where('CIDAGENTE', $request->id_agente)
            ->where(function($query) {
                $query->where('CIDDOCUMENTODE', 9)
                    ->orWhere('CIDDOCUMENTODE', 12);
            })
            ->whereBetween('CFECHA', [$request->fecha_inicial, $request->fecha_final])
            ->get();

        $totales = $documentos->sum('CTOTAL');
        //return dump($documentos);

        return view('comisiones.index', [
            'agente' => $agente,
            'documentos' => $documentos,
            'total_general' => $documentos->sum('CTOTAL'),
        ]);
    }
}
