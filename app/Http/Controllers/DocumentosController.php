<?php

namespace App\Http\Controllers;

use App\Documentos;
use App\Exports\DocumentosExport;
use Maatwebsite\Excel\Facades\Excel;

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
            'id' => $id,
        ]);
    }

    public function export($id)
    {
        return Excel::download(new DocumentosExport($id), 'saldos-' . NOW()->format('Y-m-d') . '.xlsx');
    }
}
