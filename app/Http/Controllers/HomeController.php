<?php

namespace App\Http\Controllers;

use App\Inout;
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

        $teLang = Kenteken::latest()
            ->whereRaw('`updated_at` > DATE_ADD(`created_at`, INTERVAL 2 HOUR)');

        $vrachtwagens = Kenteken::latest()
            ->where('kenteken', 'like', 'B%')
            ->orWhere('kenteken', 'like', 'V%')
            ->get();

        $teLangVrachtwagens = Kenteken::latest()
            ->whereRaw('`updated_at` > DATE_ADD(`created_at`, INTERVAL 2 HOUR)')
            ->where('kenteken', 'like', 'B%')
            ->orWhere('kenteken', 'like', 'V%')
            ->get();

        $inout = Inout::latest()
            ->get();

        return view('layouts.dashboard', compact('kentekens', 'teLang', 'teLangVrachtwagens' ,'vrachtwagens', 'inout'));
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
