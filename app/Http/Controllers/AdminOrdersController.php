<?php

namespace App\Http\Controllers;

use Auth;
use App\Orders;
use App\OrderRows;
use App\Mail\OrderAttended;
use App\Mail\OrderCancelled;
use App\Mail\OrderCompleted;
use Illuminate\Http\Request;
use Mail;

class AdminOrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if (Auth::guard('admin')->user()->agent_id != 0) {
            $orders = Orders::where('agent_id', Auth::guard('admin')->user()->agent_id)->get();
        } else {
            $orders = Orders::all();
        }

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

    public function change_price(Request $request)
    {
        if (request()->ajax()) {
            $order = OrderRows::find($request->id);
            $order->price = $request->price;
            $order->save();

            return response()->json([
                'message' => 'orden recibida',
            ], 200);
        }
    }

    public function update_total(Request $request)
    {
        if (request()->ajax()) {
            $total = 0;
            $orden = Orders::find($request->id);
            $orderRows = OrderRows::where('order_id', $request->id)->get();

            for ($i = 0; $i < count($orderRows); $i++) {
                $total = $total + ($orderRows[$i]->price * $orderRows[$i]->quantity);
            }

            $orden['total'] = $total;
            $orden->save();

            return response()->json([
                'total' => $total,
            ], 200);
        }
    }

    public function atenderOrden($id)
    {
        $orden = Orders::find($id);

        $orden->status = 2;
        $orden->save();

        Mail::to(env('MAIL_TO_ADMIN'))->send(new OrderAttended($orden));

        return redirect()->route('admin.orders.index')
            ->with('success', 'La orden se ha marcado como atendida.');
    }

    public function completarOrden($id)
    {
        $orden = Orders::find($id);

        $orden->status = 3;
        $orden->save();

        Mail::to(env('MAIL_TO_ADMIN'))->send(new OrderCompleted($orden));

        return redirect()->route('admin.orders.index')
            ->with('success', 'La orden se ha completado.');
    }

    public function cancelarOrden($id)
    {
        $orden = Orders::find($id);

        $orden->status = 0;
        $orden->save();

        Mail::to(env('MAIL_TO_ADMIN'))->send(new OrderCancelled($orden));

        return redirect()->route('admin.orders.index')
            ->with('success', 'La orden se ha cancelado.');
    }
}
