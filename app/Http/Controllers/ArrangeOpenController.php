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
        $query = DB::table('openouts');
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $query->where('arrangenumber', 'LIKE', "{$keyword}");
        }

        $query->select('id','user_id', 'arrangenumber', 'arrangefirst', 'arrangesecond', 'arrangethird', 'arrangememo');
        $query->orderBy('arrangenumber', 'asc');
        $openout = $query->paginate(10);
        return view('/arrange-data/openout_data', compact('openout','authUser','keyword'));
    }
}


