<?php

namespace App\Http\Controllers;

use App\OrderRows;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrdersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $orders = Orders::where('agent_id', Auth::guard('admin')->user()->agent_id)
            ->orderBy('id', 'DESC')->get();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        return view('admin.orders.show', [
            'order' => Orders::find($id),
            'orderRows' => OrderRows::where('order_id', $id)->get(),
        ]);
    }
}
