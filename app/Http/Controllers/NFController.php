<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\NF;
use App\Models\Empresa;
use App\Models\Entrega;
use App\Models\ItemEntrega;
use App\Models\Pedido;
use App\Models\Item;
use App\Models\Transportadora;
use Illuminate\Http\Request;
 
use Storage;
use Log;
use Auth;

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
    public function create(Request $request)
    {
        $empresaID = Empresa::where('cnpj' , '=', $request['cnpjVendedor'])->first()['id'];
        $pedido = Pedido::where('pedido_vendedor', '=', $request['pedidoNum'])->where('empresa_id', '=', $empresaID)->whereYear('data_emissao', '=', date($request['pedAno']))->withTrashed()->first();
        $transportadoraID = Transportadora::where('cnpj' , '=', $request['cnpjTransportadora'])->first()['id'];        
        $entrega = new Entrega;


        $entrega['cnpj_comprador'] = $request['cnpjComprador'];
        $entrega['cnpj_vendedor'] = $request['cnpjVendedor'];
        $entrega['pedido_id'] = $pedido['id'];
        $entrega['transportadora_id'] = $transportadoraID;
        
        $entrega->save();

        foreach ($request['nfs'] as $nfEntrega){

            $nf = new NF;


            $nf['numero'] = $nfEntrega['numero'];
            $nf['chave'] = $nfEntrega['chave'];
            $nf['data_emissao'] = date("Y/m/d", strtotime($nfEntrega['emissao']));
            $nf['entrega_id'] = $entrega['id'];
            
            if($nf::notExists($nf)){

                $nf['caminho_xml'] = "public/" . date("Y/m/d", strtotime($nfEntrega['emissao'])) . "/" . $nfEntrega['chave'] . ".xml";
                Storage::put($nf['caminho_xml'], $nfEntrega['file']);
                
                $nf->save();

                foreach ($nfEntrega['itens'] as $item){
                    $itemPedido = Item::where('pedido_id', '=', $pedido['id'])->where('numero_item', '=', $item['item'])->first();

                    $itemEntrega = new ItemEntrega;

                    $itemEntrega['quantidade'] = $item['quantidadeEntregue'];
                    $itemEntrega['item_id'] = $itemPedido['id'];
                    $itemEntrega['entrega_id'] = $entrega['id'];
                    $itemEntrega->save(); 

                }

                if($pedido->entregue())
                {
                    $pedido['status_id'] = 3;
                    $pedido->save();
                }
                else
                {
                    $pedido['status_id'] = 2;
                    $pedido->save();
                }

            } else {
                $entrega->delete();
                return response('Nota Fiscal já existente', 200)->header('Content-Type', 'text/plain');
            }
        }

        return response('Entrega Criada', 201)->header('Content-Type', 'text/plain');

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
            $pedido = Pedido::where('id', '=', $request->pedido)->withTrashed()->first();
        }
        else if (isset($request->pedido))
        {
            $pedido = Pedido::where('id', '=', $request->pedido)->withTrashed()->first();
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
