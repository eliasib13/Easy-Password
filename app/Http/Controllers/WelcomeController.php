<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    public function __construct() {

    }

    public function index() {
        if (Auth::check()) {
            return redirect('/home');
        }

        $errorLogin = Session::get('errorLogin', false);
        $email = Session::get('email', '');

        return view('welcome', [
            'errorLogin' => $errorLogin,
            'email' => $email
        ]);
    }

    public function doLogin(Request $request) {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->intended('/home');
        }
        else {
            Session::flash('errorLogin', true);
            Session::flash('email', $request->input('email'));
            return redirect('/');
        }
    }

    public function doLogout() {
        Auth::logout();
        return redirect('/');
    }

}