<?php
/**
 * Created by PhpStorm.
 * User: eliasib
 * Date: 26/9/16
 * Time: 11:26
 */

namespace App\Http\Controllers;

use App\PasswordRegister;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function updateRegister(Request $request) {
        try {
            $register = PasswordRegister::where('id', '=', $request->input('id'))->first();
            $register->name = $request->input('name');
            $register->password = encrypt($request->input('password'));

            $register->save();

            return response()->json([
                'status' => 'OK'
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'Error'
            ]);
        }
    }
}