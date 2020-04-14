<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Orders;
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
            ->where('agent_id', Auth::guard('admin')->user()->agent_id)
            ->orderBy('id', 'DESC')->get();

        $recibidas = Orders::where([
            ['status', '=', 1],
            ['agent_id', Auth::guard('admin')->user()->agent_id],
        ])->count();

        $atendidos = Orders::where([
            ['status', '=', 2],
            ['agent_id', Auth::guard('admin')->user()->agent_id],
        ])->count();

        $clientes = User::count();


        return view('admin.dashboard', [
            'today_orders' => $today_orders,
            'ordenes_recibidas' => $recibidas,
            'ordenes_atendidas' => $atendidos,
            'clientes' => $clientes,
        ]);
    }
}
