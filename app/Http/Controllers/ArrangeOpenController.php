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
        $query = Openout::select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo',DB::raw('count(*) as count'));
        $query->with(['user']);
        $keyword = $request->input('keyword');
        $rating = $request->input('rating');
        if (!empty($keyword)) {
            $query->where('arrangenumber', 'LIKE', "{$keyword}");
        }

        if (!empty($rating)) {
            $query->whereHas('user', function ($query) use ($rating) {
                $query->where('rating', $rating);
            });
        }

        // ->orWhere('rating', 'LIKE', "%$rating%")
        // $post = User::with('rating')->find(1);
        // return $post;
        // return $this->belongsTo('App\User')->where('rating');

        // $query->select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo',DB::raw('count(*) as count'));
        $query->groupBy('arrangefirst', 'arrangesecond', 'arrangethird');
        // $query->orderBy('arrangenumber', 'asc');
        $query->orderByRaw('COUNT(*) DESC');
        $openout = $query->paginate(10);
        // dd($openout);
        return view('/arrange-data/openout_data', compact('openout','authUser','keyword','rating'));
    }
}


