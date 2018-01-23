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
            ->where('created_at', '>=', Carbon::today())
            ->get();

        $kentekensVrachtwagen = $kentekens->where('kenteken', 'LIKE', 'B%');

        return view('layouts.dashboard', compact('kentekens', 'kentekensVrachtwagen'));
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
