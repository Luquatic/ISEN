<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kenteken;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KentekenController extends Controller
{
    public function create() {
        $kentekens = DB::table('kenteken')->all();

        return $kentekens;
    }
}
