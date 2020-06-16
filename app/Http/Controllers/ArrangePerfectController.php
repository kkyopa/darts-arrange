<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArrangePerfectController extends Controller
{
    public function index(Request $request) {
        $authUser = Auth::user();
        $query = Perfect::select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo',DB::raw('count(*) as count'));
        // withメゾットでuserをリレーションさせる
        $query->with(['user']);
        $keyword = $request->input('keyword');
        $rating = $request->input('rating');
        if (!empty($keyword)) {
            $query->where('arrangenumber', 'LIKE', "{$keyword}");
        }

        // whereHasでuserがリレーションされていれば第二引数が呼び出される
        if (!empty($rating)) {
            $query->whereHas('user', function ($query) use ($rating) {
                $query->where('rating', $rating);
            });
        }

        $query->groupBy('arrangefirst', 'arrangesecond', 'arrangethird');
        // $query->orderBy('arrangenumber', 'asc');
        $query->orderByRaw('COUNT(*) DESC');
        $perfect = $query->paginate(10);
        return view('/arrange-data/perfect_data', compact('perfect','authUser','keyword','rating'));
    }
}
