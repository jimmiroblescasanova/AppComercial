<?php

namespace App\Exports;

use App\Documentos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SaldoDocumentosExport implements FromView, ShouldAutoSize
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('exports.saldo-clientes', [
            'documentos' => Documentos::query()->where([
                ['CIDCLIENTEPROVEEDOR', $this->id],
                ['CCANCELADO', 0],
                ['CPENDIENTE', '>', '0.01'],
            ])->where(function($sql){
                $sql->where('CIDDOCUMENTODE', 4)->orWhere('CIDDOCUMENTODE', 7);
            })->orderBy('CFECHA')->get()
        ]);
    }

}
