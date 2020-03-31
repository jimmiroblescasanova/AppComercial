<?php

namespace App\Http\Controllers;

use App\dbProductos;
use App\OrderRows;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'productos' => dbProductos::pluck('CNOMBREPRODUCTO', 'CIDPRODUCTO'),
            'p2' => dbProductos::take(30)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $order_data = [
            'date' => NOW(),
            'user_id' => Auth::user()->id,
            'agent_id' => '1',
            'total' => '0',
        ];

        $order = new Orders($order_data);
        $order->save();

        $producto = $request->producto;
        $cantidad = $request->cantidad;
        $unidad = $request->unidad;
        $precio = $request->precio;

        foreach ($producto as $key => $name) {
            $order_row_data = [
                'order_id' => $order->id,
                'product' => $name,
                'unit' => $unidad[$key],
                'quantity' => $cantidad[$key],
                'price' => $precio[$key],
            ];
            $row = new OrderRows($order_row_data);
            $row->save();
        }

        return redirect()->route('clients.order.index')
            ->with('success', 'Orden creada correctamente');
    }

    public function searchPrice(Request $request)
    {
        if (request()->ajax()) {
            $producto = dbProductos::firstWhere('CIDPRODUCTO', $request->id);

            return response()->json([
                'precio' => $producto->CPRECIO1,
                'unidad' => $producto->unidad->CNOMBREUNIDAD,
            ], 200);
        }
    }
}
