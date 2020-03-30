<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = ['date', 'user_id', 'agent_id', 'total'];

    protected $dates = [
        'date',
    ];
}
