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
        $arrange->arrangenumber = $request->arrangenumber;
        $arrange->arrangefirst = $request->arrangefirst;
        $arrange->arrangesecond = $request->arrangesecond;
        $arrange->arrangethird = $request->arrangethird;
        $arrange->arrangememo = $request->arrangememo;
        Perfect::insert(["user_id" => $arrange->user_id, "arrangenumber" => $arrange->arrangenumber, "arrangefirst" => $arrange->arrangefirst, "arrangesecond" => $arrange->arrangesecond, "arrangethird" => $arrange->arrangethird, "arrangememo" => $arrange->arrangememo]);
        $perfect = Perfect::all();
        return redirect('perfect');

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
