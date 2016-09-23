<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PasswordRegister;


class HomeController extends Controller {
    public function __construct() {

    }

    public function index() {
        $passwordRegisters = Auth::user()->passwordRegisters()->get();

        return view('home', [
            'passwordRegisters' => $passwordRegisters
        ]);
    }

    public function addPassword(Request $request) {
        $newRegister = new PasswordRegister;

        $newRegister->name = $request->input('name');
        $newRegister->password = encrypt($request->input('password'));
        $newRegister->user_id = Auth::user()->id;

        $newRegister->save();

        return redirect('/home');
    }
}