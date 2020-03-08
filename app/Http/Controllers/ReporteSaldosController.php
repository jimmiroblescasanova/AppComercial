<?php

namespace App\Http\Controllers;

use App\Agentes;
use App\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteSaldosController extends Controller
{
    //
    public function index()
    {
        # code...
        $agentes = Agentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');

        return view('saldos.index', [
            'agentes' => $agentes,
        ]);
    }

    public function reporte(Request $request)
    {
        # code...
        $documentos = Documentos::select('CRFC', 'CRAZONSOCIAL', DB::raw('SUM("CPENDIENTE") as saldo_total'))
        ->groupBy('CRFC', 'CRAZONSOCIAL')
        ->where([
            ['CIDAGENTE', $request->agente],
            ['CPENDIENTE', '>', 0],
            ['CIDDOCUMENTODE', 4],
            ['CFECHA', '<=', $request->fecha],
        ])->get();


        return view('saldos.reporte', [
            'documentos' => $documentos,
            'agente' => Agentes::firstWhere('CIDAGENTE', $request->agente),
        ]);
    }
}
