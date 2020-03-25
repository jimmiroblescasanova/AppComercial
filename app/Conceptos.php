<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conceptos extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admConceptos';

}
