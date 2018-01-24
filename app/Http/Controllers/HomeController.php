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

        $teLang = $kentekens->filter(function($i) {
            return $i->updated_at->gt($i->created_at->subHours(2));
        });

        $vrachtwagenB = Kenteken::latest()
            ->where('kenteken', 'like', 'B%')
            ->where('created_at', '>=', Carbon::today())
            ->get();

        return view('layouts.dashboard', compact('kentekens', 'teLang', 'vrachtwagenB'));
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
