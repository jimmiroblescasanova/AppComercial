<?php

namespace App\Http\Controllers\Auth;

use DB;
use Str;
use Mail;
use App\User;
use Carbon\Carbon;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function forgot()
    {
        return view('auth.forgot-password');
    }

    public function validateEmail(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if (!$user)
        {
            return redirect()->back()
                ->withErrors(['email'=>'El correo no existe'])
                ->withInput();
        }

        DB::table('password_resets')->insert([
            'email' => $request['email'],
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
            ->where('email', $request['email'])->first();

        $token = $tokenData->token;
        $email = $tokenData->email;

        Mail::to($email)->send(new ResetPassword($token));

        return redirect('/')->with('info', 'Se ha enviado un correo con el enlace para restablecer tu contraseña.');
    }
}
