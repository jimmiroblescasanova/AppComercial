<?php

namespace App\Exports;

use App\Documentos;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CarteraVencidaExport implements FromView, ShouldAutoSize
{
    public function __construct($agente, $fecha)
    {
        $this->agente = $agente;
        $this->fecha = $fecha;
    }

    public function view(): View
    {
        $documentos = Documentos::query()->select('CIDCLIENTEPROVEEDOR', 'CRFC', 'CRAZONSOCIAL', DB::raw('SUM("CPENDIENTE") as saldo_total'))
            ->groupBy('CIDCLIENTEPROVEEDOR', 'CRFC', 'CRAZONSOCIAL')
            ->where([
                ['CIDAGENTE', $this->agente],
                ['CPENDIENTE', '>', 0],
                ['CIDDOCUMENTODE', 4],
                ['CFECHA', '<=', $this->fecha],
            ])->get();

        return view('exports.cartera-vencida', [
            'documentos' => $documentos,
        ]);
    }
}
