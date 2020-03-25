<?php

namespace App\Http\Controllers;

use App\Agentes;
use App\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CarteraVencidaExport;

class ReporteSaldosController extends Controller
{
    public function index()
    {
        $agentes = Agentes::pluck('CNOMBREAGENTE', 'CIDAGENTE');

        return view('reportes.saldos.parametros', [
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

        $data = [
            'agente' => $request->agente,
            'fecha' => $request->fecha,
        ];

        // return dd($data);

        return view('reportes.saldos.reporte', [
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
