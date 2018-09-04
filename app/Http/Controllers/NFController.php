<?php

namespace App\Http\Controllers;

use App\Models\NF;
use App\Models\Pedido;
use Illuminate\Http\Request;

class NFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\NF  $nF
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        if(isset($request->entrega) && isset($request->pedido))
        {
            $nfs = NF::where('entrega_id', '=', $request->entrega)->get();
            $pedido = Pedido::where('id', '=', $request->pedido)->first();
        }
        else if (isset($request->pedido))
        {
            $pedido = Pedido::where('id', '=', $request->pedido)->first();
            return view('nf/nf_pedido')->with('pedido', $pedido);
        } 
        else
        {
            $nfs = null;
            $pedido = null;
        }

        return view('nf/nf')->with('pedido', $pedido)->with('nfs', $nfs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NF  $nF
     * @return \Illuminate\Http\Response
     */
    public function edit(NF $nF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NF  $nF
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NF $nF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NF  $nF
     * @return \Illuminate\Http\Response
     */
    public function destroy(NF $nF)
    {
        //
    }
}
