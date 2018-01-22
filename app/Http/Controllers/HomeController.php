<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Kenteken;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        $kentekens = Kenteken::latest()
            ->get();

        return view('layouts.dashboard', compact('kentekens'));
    }

    public function countKenteken() {
        $countKentekens = Kenteken::latest()
            ->where('created_at', '>=', Carbon::today())
            ->count();
        return $countKentekens;
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
