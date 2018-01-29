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
        $today = Carbon::now()->toDateString();

        $kentekens = Kenteken::latest()
            ->whereRaw('date(created_at) = ?', [Carbon::today()])
            ->get();

        $teLang = Kenteken::latest()
            ->whereRaw('`updated_at` > DATE_ADD(`created_at`, INTERVAL 2 HOUR)');

        $vrachtwagens = Kenteken::latest()
            ->whereRaw('date(created_at) = ?', [Carbon::today()])
            ->where('kenteken', 'like', 'B%')
            ->orWhere('kenteken', 'like', 'V%')
            ->get();

        $teLangVrachtwagens = Kenteken::latest()
            ->whereRaw('date(created_at) = ?', [Carbon::today()])
            ->where('kenteken', 'like', 'B%')
            ->orWhere('kenteken', 'like', 'V%')
            ->whereRaw('`updated_at` > DATE_ADD(`created_at`, INTERVAL 2 HOUR)')
            ->count();

        return view('layouts.dashboard', compact('kentekens', 'teLang', 'teLangVrachtwagens' ,'vrachtwagens'));
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
