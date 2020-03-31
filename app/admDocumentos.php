<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admDocumentos extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admDocumentos';

    protected $dates = [
        'CFECHA',
    ];

    protected $casts = [
        'CFOLIO' => 'integer',
        'CTOTAL' => 'double',
    ];

    public function concepto()
    {
        return $this->belongsTo('App\admConceptos', 'CIDCONCEPTODOCUMENTO', 'CIDCONCEPTODOCUMENTO');
    }

    public function agente()
    {
        return $this->belongsTo('App\admAgentes', 'CIDAGENTE', 'CIDAGENTE');
    }

    public function cliente()
    {
        return $this->belongsTo('App\admClientes', 'CIDCLIENTEPROVEEDOR', 'CIDCLIENTEPROVEEDOR');
    }

    public function comision()
    {
        return round(($this->attributes['CTOTAL'] / 1.16) * 0.03);
    }
}
