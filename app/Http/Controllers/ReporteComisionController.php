<?php

namespace App\Http\Controllers;

use App\Agentes;
use App\Documentos;
use Illuminate\Http\Request;

class ReporteComisionController extends Controller
{
    //
    public function index()
    {
        $agentes = Agentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');
        //return dd($agentes);
        return view('comisiones.parametros', [
            'agentes' => $agentes,
        ]);
    }

    public function reporte(Request $request)
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

        return view('comisiones.reporte', [
            'agente' => $agente,
            'documentos' => $documentos,
            'total_general' => $documentos->sum('CTOTAL'),
        ]);
    }
}
