<?php

namespace App;

use Str;
use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Agents
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $agent_id
 * @property int $active
 * @property int $superAdmin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\admAgentes $agente
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereSuperAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agents whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agents extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'agent_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($psw)
    {
        return $this->attributes['password'] = Hash::make($psw);
    }

    public function agente()
    {
        return $this->belongsTo('App\admAgentes', 'agent_id', 'CIDAGENTE');
    }

    public function shortName()
    {
        return Str::limit($this->attributes['name'], 13);
    }
}
