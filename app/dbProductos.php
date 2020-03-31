<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dbProductos extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admProductos';

    protected $casts = [
        'CPRECIO1' => 'double',
    ];

    public function unidad()
    {
        return $this->belongsTo('App\admUnidadesMedida', 'CIDUNIDADBASE', 'CIDUNIDAD');
    }
}
