<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;

class WelcomeController extends Controller {

    public function __construct() {

    }

    public function index() {
        if (Auth::check()) {
            return redirect('/home');
        }

        $errorLogin = Session::get('errorLogin', false);
        $successRegister = Session::get('successRegister', false);
        $errorRegister = Session::get('errorRegister', false);
        $email = Session::get('email', '');

        return view('welcome', [
            'errorLogin' => $errorLogin,
            'successRegister' => $successRegister,
            'errorRegister' => $errorRegister,
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

    public function addUser(Request $request) {
        if ($request->input('new-password') != $request->input('new-password-check')) {
            Session::flash('errorRegister', true);
            return redirect('/');
        }

        try {
            $newUser = new User;
            $newUser->email = $request->input('email');
            $newUser->name = $request->input('name');
            $newUser->password = bcrypt($request->input('new-password'));

            $newUser->save();

            Session::flash('successRegister', true);
            return redirect('/');
        }
        catch (\Exception $e) {
            Session::flash('errorRegister', true);
            return redirect('/');
        }
    }
}