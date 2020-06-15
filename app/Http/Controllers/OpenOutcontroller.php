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
    $arrange->arrangefirst = self::createScore($request->arrangefirst_type, $request->arrangefirst_score);
    $arrange->first_score = self::changeScore($request->arrangefirst_type, $request->arrangefirst_score);
    $arrange->arrangesecond = self::createScore($request->arrangesecond_type, $request->arrangesecond_score);
    $arrange->second_score = self::changeScore($request->arrangesecond_type, $request->arrangesecond_score);
    $arrange->arrangethird = self::createScore($request->arrangethird_type, $request->arrangethird_score);
    $arrange->third_score = self::changeScore($request->arrangethird_type, $request->arrangethird_score);
    $arrange->arrangenumber = $arrange->first_score + $arrange->second_score + $arrange->third_score;
    $arrange->arrangememo = $request->arrangememo;
    $arrange->save();

    return redirect('openout');
}

private static function changeScore($type, $score) {
    if ($type === 'BULL') {
      return 50;
    } elseif($type === 'T') {
      return $score * 3;
    } elseif($type === 'D') {
      return $score * 2;
    } elseif($type === 'S') {
      return $score * 1;
    } else {
        return 0;
    }
  }

  private static function createScore($type, $score) {
    if($type  == "BULL") {
      return $type;
    } else {
      return $type . $score;
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


