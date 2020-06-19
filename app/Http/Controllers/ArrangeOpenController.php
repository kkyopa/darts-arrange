<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Openout;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArrangeOpenController extends Controller
{
    public function index(Request $request) {
        $authUser = Auth::user();
        // withメゾットでuserをリレーションさせる
        $query = Openout::with(['user']);
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
        $count = $query->count();
        $query->select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo',DB::raw('count(*) as count'));
        $query->groupBy('arrangefirst', 'arrangesecond', 'arrangethird');
        // $query->orderBy('arrangenumber', 'asc');
        $query->orderByRaw('COUNT(*) DESC');
        $openout = $query->paginate(10);
        return view('/arrange-data/openout_data', compact('openout','authUser','keyword','rating','count'));
    }
}


