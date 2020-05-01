<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masterout;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterOutController extends Controller
{
    public function index() {
        return view('/masterout/masterout');
    }
}
