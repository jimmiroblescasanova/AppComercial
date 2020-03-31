<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admClientes extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admClientes';
}
