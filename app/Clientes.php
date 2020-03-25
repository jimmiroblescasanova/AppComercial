<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admClientes';
}
