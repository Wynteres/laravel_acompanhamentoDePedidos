<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Pedido;
use Illuminate\Http\Request;

use Storage;
use Log;
use Auth;

class relatorioController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NF  $nF
     * @return \Illuminate\Http\Response
     */
    public function itensPendentes(Request $request)
    {
        
        $pedidos = Pedido::where('status_id', '!=', '3')->get();

        return view('relatorio/itens_pendentes')->with('pedidos', $pedidos);
    }

}
