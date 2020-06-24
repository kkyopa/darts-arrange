<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MasteroutRequest;
use App\Masterout;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterOutController extends Controller
{
    public function index() {
        $authUser = Auth::user();
        $query = DB::table('masterouts');
        $query->select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
        $query->orderBy('arrangenumber', 'asc');
        $masterout = $query->paginate(99);
        return view('masterout/masterout', compact('masterout','authUser'));
    }

    public function create(MasteroutRequest $request)
    {
        $arrange = new Masterout;
        $arrange->user_id = $request->user_id;
        $arrange->arrangefirst = self::createScore($request->arrangefirst_type, $request->arrangefirst_score);
        $arrange->first_score = self::changeScore($request->arrangefirst_type, $request->arrangefirst_score);
        $arrange->arrangesecond = self::createScore($request->arrangesecond_type, $request->arrangesecond_score);
        $arrange->second_score = self::changeScore($request->arrangesecond_type, $request->arrangesecond_score);
        $arrange->arrangethird = self::createScore($request->arrangethird_type, $request->arrangethird_score);
        $arrange->third_score = self::changeScore($request->arrangethird_type, $request->arrangethird_score);
        $arrange->arrangenumber = $arrange->first_score + $arrange->second_score + $arrange->third_score;
        $arrange->save();
        return redirect('masterout');

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
        $masterout = Masterout::find($id);
        return view('/masterout/show', compact('masterout'));
    }

    public function edit($id){
        $masterout = Masterout::find($id);
        return view('/masterout/edit', compact('masterout'));
    }


    public function update(MasteroutRequest $request, $id)
    {
        $arrange = Masterout::find($id);
        $arrange->arrangenumber = $request->arrangenumber;
        $arrange->arrangefirst = $request->arrangefirst;
        $arrange->arrangesecond = $request->arrangesecond;
        $arrange->arrangethird = $request->arrangethird;
        $arrange->arrangememo = $request->arrangememo;
        $arrange->save();
        return redirect('masterout');
    }

    public function destroy(Request $request)
    {
        Masterout::find($request->id)->delete();
        return redirect('masterout');
    }

}

