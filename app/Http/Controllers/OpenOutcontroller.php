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
        $query->select('id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
        $query->orderBy('arrangenumber', 'asc');
        $openout = $query->paginate(10);
        return view('openout/openout', compact('openout'));
    }

    public function profile() {
        $openout = OpenOut::all(); // 全データの取り出し
        return view('/user/profile', ["openout" => $openout]);
    }

    public function create(Request $request)
{
    $arrange = new OpenOut;
    $arrange->id = $request->arrangeid;
    $arrange->arrangenumber = $request->arrangenumber;
    $arrange->arrangefirst = $request->arrangefirst;
    $arrange->arrangesecond = $request->arrangesecond;
    $arrange->arrangethird = $request->arrangethird;
    $arrange->arrangememo = $request->arrangememo;
    Openout::insert(["id" => $arrange->id, "arrangenumber" => $arrange->arrangenumber, "arrangefirst" => $arrange->arrangefirst, "arrangesecond" => $arrange->arrangesecond, "arrangethird" => $arrange->arrangethird, "arrangememo" => $arrange->arrangememo]); // データベーステーブルbbsに投稿内容を入れる

    // 全件取得するコードを書くとメゾットがないと言われるから条件を絞ればって書いてあったけど...単純にpaginateがなかっただけだったかも
    // $openout = OpenOut::all(); // 全データの取り出し
    // return view('openout/openout', ["openout" => $openout]);
    $query = DB::table('openouts');
    $query->select('id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
    $query->orderBy('arrangenumber', 'asc');
    $openout = $query->paginate(10);
    return view('openout/openout', compact('openout'));
}

    public function show($id){
        $openout = Openout::find($id);
        return view('/openout/show', compact('openout'));
    }

}
