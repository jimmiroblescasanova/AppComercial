<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agentes extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admAgentes';
}
