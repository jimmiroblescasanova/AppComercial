<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\admAgentes;
use App\admDocumentos;
use Illuminate\Http\Request;
use App\Exports\CarteraVencidaExport;

class ReporteSaldosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $agentes = admAgentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');

        return view('admin.reportes.saldos.parametros', [
            'agentes' => $agentes,
        ]);
    }

    public function reporte(Request $request)
    {
        $documentos = admDocumentos::select('CIDCLIENTEPROVEEDOR', 'CRFC', 'CRAZONSOCIAL', DB::raw('SUM("CPENDIENTE") as saldo_total'))
            ->groupBy('CIDCLIENTEPROVEEDOR', 'CRFC', 'CRAZONSOCIAL')
            ->where([
                ['CIDAGENTE', $request->agente],
                ['CPENDIENTE', '>', 0],
                ['CIDDOCUMENTODE', 4],
                ['CFECHA', '<=', $request->fecha],
            ])->get();

        $data = [
            'agente' => $request->agente,
            'fecha' => $request->fecha,
        ];

        // return dd($data);

        return view('admin.reportes.saldos.reporte', [
            'documentos' => $documentos,
            'pendienteTotal' => $documentos->sum('saldo_total'),
            'data' => $data,
        ]);
    }

    public function export($agente, $fecha)
    {
        return Excel::download(new CarteraVencidaExport($agente, $fecha), 'carteravencida-' . NOW()->format('Y-m-d') . '.xlsx');
    }
}
