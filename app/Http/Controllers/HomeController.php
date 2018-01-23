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

        $cr = Carbon::create($kentekens->created_at);
        $teLang = $kentekens->where('updated_at', '>', $cr->addHours(2));

        return view('layouts.dashboard', compact('kentekens', 'teLang'));
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
