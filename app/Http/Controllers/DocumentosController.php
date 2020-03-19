<?php

namespace App\Http\Controllers;

use App\Documentos;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SaldoDocumentosExport;

class DocumentosController extends Controller
{
    public function ver($id)
    {
        $documentos = Documentos::where([
            ['CIDCLIENTEPROVEEDOR', $id],
            ['CCANCELADO', 0],
            ['CPENDIENTE', '>', '0.01'],
        ])
            ->where(function ($query) {
                $query->where('CIDDOCUMENTODE', 4)
                    ->orWhere('CIDDOCUMENTODE', 7);
            })->get();

        return view('documentos.reporte', [
            'documentos' => $documentos,
            'total' => $documentos->SUM('CTOTAL'),
            'pendiente' => $documentos->SUM('CPENDIENTE'),
            'id' => $id,
        ]);
    }

    public function export($id)
    {
        return Excel::download(new SaldoDocumentosExport($id), 'saldos-' . NOW()->format('Y-m-d') . '.xlsx');
    }
}
