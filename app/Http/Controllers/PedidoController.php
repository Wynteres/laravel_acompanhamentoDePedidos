<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Pedido;
use App\Models\Item;
use App\Models\PrazoEntrega;
use App\Models\Empresa;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Log;
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
    public function create(Request $request)
    {
        $pedido = new Pedido();
        $pedido['empresa_id'] = 1;
        $pedido['status_id'] = 1;
        $pedido['pedido_comprador'] = $request->numeroComprador;
        $pedido['pedido_vendedor'] = $request->numeroMogiglass;
        $dataEmissao = $request->dataEmissao;
        $pedido['data_emissao'] = date("Y-m-d", strtotime($dataEmissao));

        info($request->dataEmissao);
        info($dataEmissao);
        info(date("Y-m-d", strtotime($dataEmissao)));

        if($pedido::notExists($pedido)){
            $pedido->save();

            foreach ($request->itens as $item)
            {   

                $prazoEntrega = new PrazoEntrega;

                if(isset($item->prazoRecebimento))
                {
                    $prazoEntrega['data'] = date("Y-m-d", strtotime($item->prazoRecebimento));
                }
                else
                {   

                    $prazoEntrega['data'] = date("Y-m-d", strtotime($request->dataEmissao));                    
                    $prazoEntrega['data'] = date('Y-m-d', strtotime($prazoEntrega['data'] . ' + ' . $request->prazoEntrega . ' days'));
                }

                $itemF = new Item();

                if($item['codigoComprador'] != ""){
                    $itemF['codigo_comprador'] = $item['codigoComprador']; 
                }

                $itemF['codigo_vendedor'] = $item['codigoVendedor'];
                $itemF['numero_item'] = $item['numeroItem'];
                $itemF['descricao'] = $item['descricao'];
                $itemF['quantidade'] = $item['quantidade'];
                $itemF['pedido_id'] = $pedido['id'];
                $itemF->save();


                $prazoEntrega['item_id'] = $itemF['id'];
                $prazoEntrega->save();
                $itemF['prazo_entrega_id'] = $prazoEntrega['id'];
                $itemF->save();
            }

            return response('Success', 201)
                  ->header('Content-Type', 'text/plain');

        } else {

            return response('Success', 200)->header('Content-Type', 'text/plain');
        }

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
            $pedido = Pedido::where('id', '=', $request->id)->withTrashed()->first();
            
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
        Pedido::onlyTrashed()->find($request->id)->restore();
                
        $pedidos = Pedido::all();

        return redirect()->route('pedidos');
    }
}
