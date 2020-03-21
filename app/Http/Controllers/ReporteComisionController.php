<?php

namespace App\Http\Controllers;

use App\Agentes;
use App\Documentos;
use Illuminate\Http\Request;
use App\Exports\ComisionesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReporteComisionController extends Controller
{
    //
    public function index()
    {
        $agentes = Agentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');

        return view('comisiones.parametros', [
            'agentes' => $agentes,
        ]);
    }

    public function reporte(Request $request)
    {
        $documentos = Documentos::where('CIDAGENTE', $request->id_agente)
            ->where(function($query) {
                $query->where('CIDDOCUMENTODE', 9)
                    ->orWhere('CIDDOCUMENTODE', 12);
            })
            ->whereBetween('CFECHA', [$request->fecha_inicial, $request->fecha_final])
            ->get();

        return view('comisiones.reporte', [
            'agente' => Agentes::firstWhere('CIDAGENTE', $request->id_agente),
            'total_general' => $documentos->sum('CTOTAL'),
            'documentos' => $documentos,
            'data' => $request,
        ]);
    }

    public function export($agente, $fInicial, $fFinal)
    {
        return Excel::download(new ComisionesExport($agente, $fInicial, $fFinal), 'comisiones-' . NOW()->format('Y-m-d') . '.xlsx');
    }
}
