<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfectController extends Controller
{
    public function index() {
        return view('/perfect/perfect');
    }
}
