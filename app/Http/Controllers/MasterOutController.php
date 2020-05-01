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
        $arrange->arrangenumber = $request->arrangenumber;
        $arrange->arrangefirst = $request->arrangefirst;
        $arrange->arrangesecond = $request->arrangesecond;
        $arrange->arrangethird = $request->arrangethird;
        $arrange->arrangememo = $request->arrangememo;
        Masterout::insert(["user_id" => $arrange->user_id, "arrangenumber" => $arrange->arrangenumber, "arrangefirst" => $arrange->arrangefirst, "arrangesecond" => $arrange->arrangesecond, "arrangethird" => $arrange->arrangethird, "arrangememo" => $arrange->arrangememo]);
        $masterout = Masterout::all();
        return redirect('masterout');

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

