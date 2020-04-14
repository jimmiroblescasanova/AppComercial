<?php

namespace App\Http\Controllers;


use Auth;
use App\Orders;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home', [
            'orders' => Orders::where('user_id', Auth::user()->id)
                ->orderBy('id', 'DESC')->take(15)->get(),
        ]);
    }
}
