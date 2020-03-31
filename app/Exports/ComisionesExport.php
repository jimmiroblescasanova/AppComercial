<?php

namespace App\Exports;

use App\admDocumentos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ComisionesExport implements FromView, ShouldAutoSize
{
    public function __construct($agente, $fInicial, $fFinal)
    {
        $this->agente = $agente;
        $this->fecha_inicial = $fInicial;
        $this->fecha_final = $fFinal;
    }

    public function view(): View
    {
        $documentos = admDocumentos::where('CIDAGENTE', $this->agente)
            ->where(function ($query) {
                $query->where('CIDDOCUMENTODE', 9)
                    ->orWhere('CIDDOCUMENTODE', 12);
            })
            ->whereBetween('CFECHA', [$this->fecha_inicial, $this->fecha_final])
            ->get();

        return view('exports.comisiones', [
            'documentos' => $documentos,
        ]);
    }
}
