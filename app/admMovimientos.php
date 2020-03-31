<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admMovimientos extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admMovimientos';
}
