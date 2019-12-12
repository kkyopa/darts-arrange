<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Openout;
use App\User;

class OpenOutcontroller extends Controller
{
    public function index() {
        $openout = OpenOut::all(); // 全データの取り出し
        return view('/problem/openout', ["openout" => $openout]);
    }

    public function profile() {
        $openout = OpenOut::all(); // 全データの取り出し
        return view('/user/profile', ["openout" => $openout]);
    }

    // public function create(Request $request) {

    //     // バリデーションチェック
    //     // $request->validate([
    //     //     'arrangememo' => 'required|min:5|max:140',
    //     // ]);

    //     // 投稿内容の受け取って変数に入れる
    //     $arrangenumber = $request->input('arrangenumber');
    //     $arrangefirst = $request->input('arrangefirst');
    //     $arrangesecond = $request->input('arrangesecond');
    //     $arrangethird = $request->input('arrangethird');
    //     $arrangememo = $request->input('arrangememo');

    //     OpenOut::insert(["arrangenumber" => $arrangenumber,"arrangefirst" => $arrangefirst, "arrangesecond" => $arrangesecond, "arrangethird" => $arrangethird, "arrangememo" => $arrangememo]); // データベーステーブルOpenoutに投稿内容を入れる

    //     $openout = Openout::all(); // 全データの取り出し
    //     return view('../user/profile', ["openout" => $openout]); // bbs.indexにデータを渡す
    //     $openout->save();
    // }

    public function store(Request $request)
{
    $arrange = new OpenOut;
    $arrange->user_id = $request->arrangeid;
    $arrange->arrangenumber = $request->arrangenumber;
    $arrange->arrangefirst = $request->arrangefirst;
    $arrange->arrangesecond = $request->arrangesecond;
    $arrange->arrangethird = $request->arrangethird;
    $arrange->arrangememo = $request->arrangememo;
    $arrange->save();
}
}

