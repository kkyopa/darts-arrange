<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class OpenOutcontroller extends Controller
{
    public function index() {
        return view('/problem/openout');
    }

    public function create(Request $request) {

        // バリデーションチェック
        // $request->validate([
        //     'arrangememo' => 'required|min:5|max:140',
        // ]);

        // 投稿内容の受け取って変数に入れる
        $arrangefirst = $request->input('arrangefirst');
        $arrangesecond = $request->input('arrangesecond');
        $arrangethird = $request->input('arrangethird');
        $arrangememo = $request->input('arrangememo');

        // Openout::insert(["arrangefirst" => $arrangefirst, "arrangesecond" => $arrangesecond, "arrangethird" => $arrangethird, "arrangememo" => $arrangememo]); // データベーステーブルOpenoutに投稿内容を入れる

        // $bbs = Openout::all(); // 全データの取り出し
        // return view('/problem/openout', ["openout" => $opennout]); // bbs.indexにデータを渡す
    }
}

