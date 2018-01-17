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
        return view('layouts.dashboard');
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }

    public function getKenteken() {
        $kentekens = Kenteken::all();
    }
}
