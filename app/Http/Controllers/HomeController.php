<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function __construct() {

    }

    public function index() {
        $passwordRegisters = Auth::user()->passwordRegisters()->get();

        return view('home', [
            'passwordRegisters' => $passwordRegisters
        ]);
    }
}