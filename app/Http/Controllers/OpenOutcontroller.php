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

    public function create(Request $request)
{
    $arrange = new OpenOut;
    $arrange->arrangenumber = $request->arrangenumber;
    $arrange->arrangefirst = $request->arrangefirst;
    $arrange->arrangesecond = $request->arrangesecond;
    $arrange->arrangethird = $request->arrangethird;
    $arrange->arrangememo = $request->arrangememo;
    Openout::insert(["arrangenumber" => $arrange->arrangenumber, "arrangefirst" => $arrange->arrangefirst, "arrangesecond" => $arrange->arrangesecond, "arrangethird" => $arrange->arrangethird, "arrangememo" => $arrange->arrangememo]);
    $openout = OpenOut::all(); // 全データの取り出し
    return redirect('openout');
    // $arrangenumber = $request->input('arrangenumber');
    // $arrangefirst = $request->input('arrangefirst');
    // $arrangesecond = $request->input('arrangesecond');
    // $arrangethird = $request->input('arrangethird');
    // $arrangememo = $request->input('arrangememo');
    // Openout::insert(["arrangenumber" => $arrangenumber, "arrangefirst" => $arrangefirst, "arrangesecond" => $arrangesecond, "arrangethird" => $arrangethird, "arrangememo" => $arrangememo]);

    // 全件取得するコードを書くとメゾットがないと言われるから条件を絞ればって書いてあったけど...単純にpaginateがなかっただけだったかも

    // return view('openout/openout', ["openout" => $openout]);
    // $query = DB::table('openouts');
    // $query->select('id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
    // $query->orderBy('arrangenumber', 'asc');
    // $openout = $query->paginate(10);
    // return view('openout/openout', compact('openout'));
}

    public function show($id){
        $openout = Openout::find($id);
        return view('/openout/show', compact('openout'));
    }

    public function edit($id){
        $openout = Openout::find($id);
        return view('/openout/edit', compact('openout'));
    }


    public function update(Request $request, $id)
    {
        $arrange = Openout::find($id);
        // $arrange->id = $request->id;
        $arrange->arrangenumber = $request->arrangenumber;
        $arrange->arrangefirst = $request->arrangefirst;
        $arrange->arrangesecond = $request->arrangesecond;
        $arrange->arrangethird = $request->arrangethird;
        $arrange->arrangememo = $request->arrangememo;
        $arrange->save();
        return redirect('openout');
    }


    public function profile() {
        $openout = OpenOut::all(); // 全データの取り出し
        return view('/user/profile', ["openout" => $openout]);
    }


}


