<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
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
        return $this->belongsTo('App\Conceptos', 'CIDCONCEPTODOCUMENTO', 'CIDCONCEPTODOCUMENTO');
    }

    public function agente()
    {
        return $this->belongsTo('App\Agentes', 'CIDAGENTE', 'CIDAGENTE');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Clientes', 'CIDCLIENTEPROVEEDOR', 'CIDCLIENTEPROVEEDOR');
    }

    public function comision()
    {
        return round(($this->attributes['CTOTAL'] / 1.16) * 0.03);
    }
}
