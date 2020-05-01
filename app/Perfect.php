<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Perfect extends Model
{
    protected $fillable = ['id', 'arrangenumber','arrangefirst','arrangesecond','arrangethird','arrangememo']; // 追記したところ

    public function user() // 単数形
    {
        return $this->belongsTo('App\User');
    }
}
