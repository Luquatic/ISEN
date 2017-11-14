<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('auth.register');
    }

    public function store() {
        //Validate the form
        $this->validate(request(), [
            'user_id' => 'required|integer|unique:klanten',
            'username' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            'password' => 'required|string|min:4|'
        ]);

        //Create and save the user
        $klant = User::create(request(['user_id', 'username', 'password']));

        return redirect('/register');
    }
}
