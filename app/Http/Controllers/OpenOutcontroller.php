<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Openout;

class OpenOutcontroller extends Controller
{
    public function index() {
        // $openout = Openout::all(); // 全データの取り出し
        // return view('/problem/openout', ["bbs" => $openout]);
        return view('/problem/openout');
    }
}