<?php

namespace App\Exports;

use App\admDocumentos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DocumentosExport implements FromView, ShouldAutoSize
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('exports.documentos', [
            'documentos' => admDocumentos::query()->where([
                ['CIDCLIENTEPROVEEDOR', $this->id],
                ['CCANCELADO', 0],
                ['CPENDIENTE', '>', '0.01'],
            ])->where(function ($sql) {
                $sql->where('CIDDOCUMENTODE', 4)->orWhere('CIDDOCUMENTODE', 7);
            })->orderBy('CFECHA')->get()
        ]);
    }
}
