<?php

namespace App\Http\Controllers;

use Auth;
use App\Orders;
use App\OrderRows;
use App\admProductos;
use Illuminate\Http\Request;

class PublicOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('public.orders.index', [
            'orders' => Orders::where('user_id', Auth::user()->id)
                ->orderBy('id', 'DESC')->paginate(),
        ]);
    }

    public function create()
    {
        return view('public.orders.create', [
            'productos' => admProductos::pluck('CNOMBREPRODUCTO', 'CIDPRODUCTO'),
        ]);
    }

    public function store(Request $request)
    {
        $order_data = [
            'date' => NOW(),
            'user_id' => Auth::user()->id,
            'agent_id' => Auth::user()->agent_id,
            'total' => '0',
        ];

        $order = new Orders($order_data);
        $order->save();

        $producto = $request->input('producto');
        $cantidad = $request->cantidad;
        $unidad = $request->unidad;
        $precio = $request->precio;

        $total = 0;
        foreach ($producto as $key => $name) {
            $order_row_data = [
                'order_id' => $order->id,
                'product' => $name,
                'unit' => $unidad[$key],
                'quantity' => $cantidad[$key],
                'price' => $precio[$key],
            ];
            $total = $total + ($cantidad[$key]*$precio[$key]);
            $row = new OrderRows($order_row_data);
            $row->save();
        }

        $order['total'] = $total;
        $order->save();

        return redirect()->route('clients.order.index')
            ->with('success', 'Orden creada correctamente');
    }

    public function show($id)
    {
        $order = Orders::findOrFail($id);
        $orderRows = OrderRows::where('order_id', $id)->get();

        return view('public.orders.show', [
            'order' => $order,
            'orderRows' => $orderRows,
        ]);
    }

    public function cancel($id)
    {
        $order = Orders::findOrFail($id);
        $order->status = 0;
        $order->save();

        return redirect()->back()->with('success', 'Orden cancelada');
    }

    public function searchPrice(Request $request)
    {
        if (request()->ajax()) {
            $producto = admProductos::firstWhere('CIDPRODUCTO', $request->id);

            return response()->json([
                'precio' => $producto->CPRECIO1,
                'unidad' => $producto->unidad->CNOMBREUNIDAD,
            ], 200);
        }
    }
}
