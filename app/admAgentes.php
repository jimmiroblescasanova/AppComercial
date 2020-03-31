<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admAgentes extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.admAgentes';
}
