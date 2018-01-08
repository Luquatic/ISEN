<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kenteken;
use App\Http\Requests;

class KentekenController extends Controller
{
    public function index() {
        $kenteken = Kenteken::all();

        return view('kentekens.index', compact('kenteken'));
    }
}
