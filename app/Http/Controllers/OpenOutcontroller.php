<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OpenoutRequest;
use App\Openout;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpenOutcontroller extends Controller
{
    public function index() {
        $authUser = Auth::user();
        $query = DB::table('openouts');
        $query->select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
        $query->orderBy('arrangenumber', 'asc');
        $openout = $query->paginate(99);
        return view('openout/openout', compact('openout','authUser'));
    }

    public function create(OpenoutRequest $request)
{
    $arrange = new OpenOut;
    $arrange->user_id = $request->user_id;
    $arrange->arrangenumber = $request->arrangenumber;
    $arrange->arrangefirst = $request->arrangefirst;
    $arrange->first_score = self::changeScore($request->arrangefirst);
    $arrange->arrangesecond = $request->arrangesecond;
    $arrange->second_score = self::changeScore($request->arrangesecond);
    $arrange->arrangethird = $request->arrangethird;
    $arrange->third_score = self::changeScore($request->arrangethird);
    $arrange->arrangememo = $request->arrangememo;
    $arrange->save();

    return redirect('openout');
}

private static function changeScore($comment) {
    $first_string = substr($comment, 0, 1);
    $first_number = trim($comment, $first_string);
    $first_number = (intval($first_number));
    if ($first_string === 'B') {
      return 50;
    } elseif($first_string === 'T') {
      return $first_number * 3;
    } elseif($first_string === 'D') {
      return $first_number * 2;
    } elseif($first_string === 'S') {
      return $first_number * 1;
    } else {
      $first_string = 0;
    }
  }


    public function show($id){
        $openout = Openout::find($id);
        return view('/openout/show', compact('openout'));
    }

    public function edit($id){
        $openout = Openout::find($id);
        return view('/openout/edit', compact('openout'));
    }


    public function update(OpenoutRequest $request, $id)
    {
        $arrange = Openout::find($id);
        $arrange->arrangenumber = $request->arrangenumber;
        $arrange->arrangefirst = $request->arrangefirst;
        $arrange->arrangesecond = $request->arrangesecond;
        $arrange->arrangethird = $request->arrangethird;
        $arrange->arrangememo = $request->arrangememo;
        $arrange->save();
        return redirect('openout');
    }

    public function destroy(Request $request)
    {
        Openout::find($request->id)->delete();
        return redirect('openout');
    }

    public function profile() {
        $openout = OpenOut::all(); // 全データの取り出し
        return view('/user/profile', ["openout" => $openout]);
    }

}


