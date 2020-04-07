<?php

namespace App\Http\Controllers;

use Excel;
use App\admDocumentos;
use App\Exports\DocumentosExport;

class ReporteDocumentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function ver($id)
    {
        $documentos = admDocumentos::where([
            ['CIDCLIENTEPROVEEDOR', $id],
            ['CCANCELADO', 0],
            ['CPENDIENTE', '>', '0.01'],
        ])
            ->where(function ($query) {
                $query->where('CIDDOCUMENTODE', 4)
                    ->orWhere('CIDDOCUMENTODE', 7);
            })->get();

        return view('admin.reportes.documentos.reporte', [
            'documentos' => $documentos,
            'id' => $id,
        ]);
    }

    public function export($id)
    {
        return Excel::download(new DocumentosExport($id), 'documentos-' . NOW()->format('Y-m-d') . '.xlsx');
    }
}
