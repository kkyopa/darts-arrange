<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterRatingController extends Controller
{

    public function index() {
        return view('/auth/rating');

    }

    public function update($request) {
        $user = User::find(Auth::id());
        $user->rating = $request->input('rating');
        $user->save();
        return redirect('home');
    }
}
