<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admMovimientos';
}
