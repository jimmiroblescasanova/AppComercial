<?php

namespace App\Http\Controllers;

use App\admAgentes;
use App\admDocumentos;
use Illuminate\Http\Request;
use App\Exports\ComisionesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReporteComisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $agentes = admAgentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');

        return view('admin.reportes.comisiones.parametros', [
            'agentes' => $agentes,
        ]);
    }

    public function reporte(Request $request)
    {
        $documentos = admDocumentos::where('CIDAGENTE', $request->id_agente)
            ->where(function ($query) {
                $query->where('CIDDOCUMENTODE', 9)
                    ->orWhere('CIDDOCUMENTODE', 12);
            })
            ->whereBetween('CFECHA', [$request->fecha_inicial, $request->fecha_final])
            ->get();

        return view('reportes.comisiones.reporte', [
            'agente' => admAgentes::firstWhere('CIDAGENTE', $request->id_agente),
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
