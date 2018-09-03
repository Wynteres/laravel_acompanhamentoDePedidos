<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Pedido;
use App\Models\Empresa;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pedidos = Pedido::all();

        return view('pedido/pedido_management')->with('pedidos', $pedidos);
    }

    public function archive()
    {

        $pedidos = Pedido::onlyTrashed()->get();

        return view('pedido/pedido_archive')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(isset($request->id))
        {
            $pedido = Pedido::where('id', '=', $request->id)->first();
            
        }
        else
        {
            $pedido = null;
        }

        return view('pedido/pedido')->with('pedido', $pedido);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Pedido::find($request->id)->delete();
                
        $pedidos = Pedido::all();

        return redirect()->route('pedidos');
    }

    public function restore(Request $request)
    {
        Pedido::find($request->id)->restore();
                
        $pedidos = Pedido::all();

        return redirect()->route('pedidos');
    }
}
