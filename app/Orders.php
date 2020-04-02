<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = ['date', 'user_id', 'agent_id', 'total'];

    protected $dates = [
        'date',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
