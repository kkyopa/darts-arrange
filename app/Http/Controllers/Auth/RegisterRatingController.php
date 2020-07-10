<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRatingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterRatingController extends Controller
{

    public function index() {
        return view('/auth/rating');

    }

    public function update(RegisterRatingRequest $request) {
        $user = User::find(Auth::id());
        $user->rating = $request->input('rating');
        $user->save();
        return redirect('home');
    }
}
