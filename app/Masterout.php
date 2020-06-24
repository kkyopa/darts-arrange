<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Masterout extends Model
{
    protected $fillable = ['id', 'arrangenumber','arrangefirst','arrangesecond','arrangethird','arrangememo']; // 追記したところ

    public function user() // 単数形
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
