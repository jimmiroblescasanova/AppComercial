<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
	public function index()
	{
		$parametros = DB::table('dbo.admParametros')->get();

		//return dd($parametros[0]);

    	return view('documentos', ['parametros' => $parametros]);
	}
}
