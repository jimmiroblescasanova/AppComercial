<?php

namespace App\Http\Controllers;

use App\Orders;
use App\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $today_orders = Orders::whereDate('date', Carbon::today())
            ->orderBy('id', 'DESC')->get();

        $recibidas = Orders::where('status', '=', 1)->count();
        $atendidos = Orders::where('status', '=', 2)->count();

        $clientes = User::count();


        return view('admin.dashboard', [
            'today_orders' => $today_orders,
            'ordenes_recibidas' => $recibidas,
            'ordenes_atendidas' => $atendidos,
            'clientes' => $clientes,
        ]);
    }
}
