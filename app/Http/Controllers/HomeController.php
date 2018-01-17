<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Kenteken;


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

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
