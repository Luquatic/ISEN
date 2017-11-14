<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{

    public function create() {
        return view('auth.login');
    }

    public function store() {
        if (! auth()->attempt(request(['klant_id', 'password']))) {
            return back()->withErrors([
                'message' => 'Verkeerde klantnummer en/of code'
            ]);
        }

        $user = Auth::user();
        if($user->klant_id == 0) {
            return redirect('/register');
        }

        return redirect('/home');
    }


    public function destroy() {
        auth()->logout();

        return redirect('/');
    }
}
