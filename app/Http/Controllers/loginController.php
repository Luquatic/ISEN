<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{

    public function create() {
        return view('layouts.home');
    }

    public function store() {
        if (! auth()->attempt(request(['username', 'password']))) {
            return back()->withErrors([
                'message' => 'Incorrect username and/or password'
            ]);
        }

        $user = Auth::user();
        if($user->id == 0) {
            return redirect('/register');
        }

        return redirect('/home');
    }


    public function destroy() {
        auth()->logout();

        return redirect('/');
    }
}
