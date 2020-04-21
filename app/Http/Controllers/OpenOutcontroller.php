<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Openout;
use App\User;
use Illuminate\Support\Facades\DB;



class OpenOutcontroller extends Controller
{
    public function index() {

        $query = DB::table('openouts');
        $query->select('user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
        $query->orderBy('arrangenumber', 'asc');
        $openout = $query->paginate(5);
        return view('/problem/openout', compact('openout'));
    }

    public function profile() {
        $openout = OpenOut::all(); // 全データの取り出し
        return view('/user/profile', ["openout" => $openout]);
    }


    public function create(Request $request)
{
    $arrange = new OpenOut;
    $arrange->user_id = $request->arrangeid;
    $arrange->arrangenumber = $request->arrangenumber;
    $arrange->arrangefirst = $request->arrangefirst;
    $arrange->arrangesecond = $request->arrangesecond;
    $arrange->arrangethird = $request->arrangethird;
    $arrange->arrangememo = $request->arrangememo;
    // $arrange->save();
    Openout::insert(["user_id" => $arrange->user_id, "arrangenumber" => $arrange->arrangenumber, "arrangefirst" => $arrange->arrangefirst, "arrangesecond" => $arrange->arrangesecond, "arrangethird" => $arrange->arrangethird, "arrangememo" => $arrange->arrangememo]); // データベーステーブルbbsに投稿内容を入れる
    $openout = OpenOut::all(); // 全データの取り出し
    return view('/problem/openout', ["openout" => $openout]);
}
}

