<?php

namespace App\Http\Controllers;

use App\Agentes;
use App\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteSaldosController extends Controller
{
    public function index()
    {
        $agentes = Agentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');

        return view('saldos.parametros', [
            'agentes' => $agentes,
        ]);
    }

    public function reporte(Request $request)
    {
        $documentos = Documentos::select('CIDCLIENTEPROVEEDOR', 'CRFC', 'CRAZONSOCIAL', DB::raw('SUM("CPENDIENTE") as saldo_total'))
            ->groupBy('CIDCLIENTEPROVEEDOR', 'CRFC', 'CRAZONSOCIAL')
            ->where([
                ['CIDAGENTE', $request->agente],
                ['CPENDIENTE', '>', 0],
                ['CIDDOCUMENTODE', 4],
                ['CFECHA', '<=', $request->fecha],
            ])->get();


        return view('saldos.reporte', [
            'documentos' => $documentos,
            'agente' => Agentes::firstWhere('CIDAGENTE', $request->agente),
            'pendienteTotal' => $documentos->sum('saldo_total'),
        ]);
    }
}
