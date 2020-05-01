<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Masterout extends Model
{
    protected $fillable = ['id', 'arrangenumber','arrangefirst','arrangesecond','arrangethird','arrangememo']; // 追記したところ

    public function user() // 単数形
    {
        return $this->belongsTo('App\User');
    }
}
