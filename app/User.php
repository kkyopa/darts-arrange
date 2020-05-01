<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Openout;
use App\Masterout;
use App\Perfect;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rating',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function openouts() // 複数形
    {
        return $this->hasMany('App\Openout');
    }

    public function masterouts() // 複数形
    {
        return $this->hasMany('App\Masterout');
    }

    public function perfects() // 複数形
    {
        return $this->hasMany('App\Perfect');
    }
}
