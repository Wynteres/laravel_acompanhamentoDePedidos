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
        $pedido['empresa_id'] = $request->empresa;
        $pedido['status_id'] = 1; 
        $pedido['pedido_comprador'] = $request->numeroComprador;
        $pedido['pedido_vendedor'] = $request->numeroMogiglass;
        $dataEmissao = $request->dataEmissao;
        $pedido['data_emissao'] = date("Y-m-d", strtotime($dataEmissao));

        if(Empresa::notExists($request->comprador['cnpj']))
        {
            $comprador = new Empresa;
            $comprador['nome'] = $request->comprador['nome'];
            $comprador['cnpj'] = $request->comprador['cnpj'];
            $comprador['codigo_unidade'] = $request->comprador['unidade'];
            $comprador->save();
            $pedido['comprador_id'] = $comprador['id'];
        } 
        else
        {
            $comprador = Empresa::where('cnpj', '=', $request->comprador['cnpj'])->first();
            $comprador['codigo_unidade'] = $request->comprador['unidade'];
            $comprador->update();
            $pedido['comprador_id'] = $comprador['id'];
        }

        if($pedido::notExists($pedido)){
            $pedido->save();

            foreach ($request->itens as $item)
            {  

                $prazoEntrega = new PrazoEntrega;
                // info($pedido['pedido_vendedor'] . " - " . $item['prazoRecebimento']);
                
                if($item['prazoRecebimento'] != "1753-01-01")
                {
                    // info($pedido['pedido_vendedor'] . " - " . $item['prazoRecebimento']);
                    $prazoEntrega['data'] = date("Y-m-d", strtotime($item['prazoRecebimento']));
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

            return response('Pedido Criado', 201)
                  ->header('Content-Type', 'text/plain');

        } else {
            $pedido['id'] = Pedido::getExistingPedido($pedido)['id'];

            if ($pedido['status_id'] == 3) {
                return response('Pedido finalizado', 200)->header('Content-Type', 'text/plain');
            }

            $pedido->update();

            foreach ($request->itens as $item)
            {  

                if (!Item::notExists($item, $pedido['id'])) {
                    $itemF['id'] = Item::getExistingItem($item, $pedido['id'])['id'];
                } else {
                    $itemF = new Item();
                }

                $prazoEntrega = new PrazoEntrega;
                
                if($item['prazoRecebimento'] != "1753-01-01")
                {
                    $prazoEntrega['data'] = date("Y-m-d", strtotime($item['prazoRecebimento']));
                }
                else
                {
                    $prazoEntrega['data'] = date("Y-m-d", strtotime($request->dataEmissao));
                    $prazoEntrega['data'] = date('Y-m-d', strtotime($prazoEntrega['data'] . ' + ' . $request->prazoEntrega . ' days'));
                }


                if($item['codigoComprador'] != ""){
                    $itemF['codigo_comprador'] = $item['codigoComprador']; 
                }

                $itemF['codigo_vendedor'] = $item['codigoVendedor'];
                $itemF['numero_item'] = $item['numeroItem'];
                $itemF['descricao'] = $item['descricao'];
                $itemF['quantidade'] = $item['quantidade'];
                $itemF['pedido_id'] = $pedido['id'];

                $prazoEntrega['item_id'] = $itemF['id'];
                $prazoEntrega->save();
                $itemF['prazo_entrega_id'] = $prazoEntrega['id'];
                $itemF->update();
            }

            return response('Pedido atalizado', 201)->header('Content-Type', 'text/plain');
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

        return redirect()->route('pedidos-arquivados');
    }
}
