<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Documentos;
use App\movimientos;

class DocumentController extends Controller
{
	public function index()
	{
		//$parametros = DB::table('dbo.admParametros')->get();
		$documentos = Documentos::get();
		$movimientos = Movimientos::get();

		//return dd($parametros[0]);

    	return view('documentos', [
    	    'documentos' => $documentos,
            'movimientos' => $movimientos,
        ]);
	}
}
