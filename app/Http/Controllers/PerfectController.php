<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PerfectRequest;
use App\Perfect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfectController extends Controller
{
    public function index() {
        $authUser = Auth::user();
        $query = DB::table('perfects');
        $query->select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
        $query->orderBy('arrangenumber', 'asc');
        $perfect = $query->paginate(99);
        return view('perfect/perfect', compact('perfect','authUser'));
    }

    public function create(PerfectRequest $request)
    {
        $arrange = new Perfect;
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
        return redirect('perfect');

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
        $perfect = Perfect::find($id);
        return view('/perfect/show', compact('perfect'));
    }

    public function edit($id){
        $perfect = Perfect::find($id);
        return view('/perfect/edit', compact('perfect'));
    }


    public function update(PerfectRequest $request, $id)
    {
        $arrange = Perfect::find($id);
        $arrange->arrangenumber = $request->arrangenumber;
        $arrange->arrangefirst = $request->arrangefirst;
        $arrange->arrangesecond = $request->arrangesecond;
        $arrange->arrangethird = $request->arrangethird;
        $arrange->arrangememo = $request->arrangememo;
        $arrange->save();
        return redirect('perfect');
    }

    public function destroy(Request $request)
    {
        Perfect::find($request->id)->delete();
        return redirect('perfect');
    }
}
