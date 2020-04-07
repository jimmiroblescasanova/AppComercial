<?php

namespace App\Http\Controllers\Auth;

use DB;
use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    public function reset($token)
    {
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        if ( !$tokenData ) return redirect('/')->with('info', 'El token ha caducado');

        return view('auth.new-password', compact('token'));
    }

    public function newPassword(Request $request, $token)
    {
        $validData = $request->validate([
           'password' => 'required|min:6|confirmed',
        ]);

        $password = $validData['password'];
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        $user = User::where('email', $tokenData->email)->first();

        $user->password = $password;
        $user->update();

        DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect('/')->with('info', 'Contraseña cambiada con éxito.');
    }
}
