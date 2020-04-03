<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Orders
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property float $total
 * @property int $user_id
 * @property int $agent_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $cliente
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orders whereUserId($value)
 * @mixin \Eloquent
 */
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
