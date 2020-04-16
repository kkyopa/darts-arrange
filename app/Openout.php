<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Openout extends Model
{
    protected $fillable = ['arrangenumber','arrangefirst','arrangesecond','arrangethird','arrangememo']; // 追記したところ
}
