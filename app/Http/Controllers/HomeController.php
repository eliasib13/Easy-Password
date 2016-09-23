<?php 

namespace App\Http\Controllers;

class HomeController extends Controller {
    public function __construct() {

    }

    public function index() {
        return 'HomeController: OK <br/> <a href="' . url("/doLogout") .  '">Logout</a>';
    }
}