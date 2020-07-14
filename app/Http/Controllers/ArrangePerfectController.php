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
        // withメゾットでuserをリレーションさせる
        $query = Perfect::with(['user']);
        $keyword = $request->input('keyword');
        $rating = $request->input('rating');
        $name = $request->input('name');
        if (!empty($keyword)) {
            $query->where('arrangenumber', 'LIKE', "{$keyword}");
        }

        // whereHasでuserがリレーションされていれば第二引数が呼び出される
        if (!empty($rating)) {
            $query->whereHas('user', function ($query) use ($rating) {
                $query->where('rating', $rating);
            });
        }
        if (!empty($name)) {
            $query->whereHas('user', function ($query) use ($name) {
                $query->where('name', 'LIKE', "{$name}");
            });
        }

        $count = $query->count();
        $query->select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo',DB::raw('count(*) as count'));
        $query->groupBy('arrangefirst', 'arrangesecond', 'arrangethird');
        $query->orderByRaw('COUNT(*) DESC');
        $perfect = $query->paginate(10);
        return view('/arrange-data/perfect_data', compact('perfect','authUser','keyword','rating','name','count'));
    }
}
