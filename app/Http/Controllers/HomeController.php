<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('layouts.home');
    }

    public function getUser() {
        $user = Auth::user();
        return $user->username;
    }
}
