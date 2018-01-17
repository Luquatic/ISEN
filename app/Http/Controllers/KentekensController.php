<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kenteken;
use App\Http\Requests;

class KentekensController extends Controller
{
    public function index() {
        $kentekens = Kenteken::all();

        return view('layouts.kenteken', compact('kentekens'));
    }
}
