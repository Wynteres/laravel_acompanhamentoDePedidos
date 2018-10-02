@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
        <div class="panel-heading">
			<div class="row mb-4">
            	<div class="col-4 offset-4 text-center title">Itens pendentes</div>
        	</div>
    		<hr class="hr-section">
        </div>
        <div class="panel-body  mt-4">

	  		<table id="list-table-itens-pendentes" class="table display table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr class="text-center">
		                <th>Pedido</th>
		                <th>Data de emissão</th>
		                <th style="min-width: 170px; ">CNPJ Unidade</th>
		                <th>Código da unidade</th>
		                <th>Código do produto</th>
		                <th>Produto</th>
		                <th>Qtd</th>
		                <th>Data de envio</th>
		                <th></th>
		            </tr>
		        </thead>
		        <tbody>

		        	@foreach($pedidos as $pedido)
	        			@foreach($pedido->itensPendentes() as $item)
				            <tr>
				                <td>{{ $pedido['pedido_comprador'] }}</td>
				                <td><?php 
				                		$date = strtotime($pedido['data_emissao']);
				                		echo date("d/m/Y", $date);
				                	 ?>			                	 	
			                	</td>
			                	<td>{{$pedido->comprador['cnpj']}}</td>
			                	<td class="text-center">{{$pedido->comprador['codigo_unidade']}}</td>
			                	<td>{{$item['codigo_comprador']}}</td>
			                	<td>{{$item['descricao']}}</td>
				                <td>{{$item['quantidade']}}</td>

			                	<td><?php 
			                		$date = strtotime($item->prazoEntrega()['data']);
			                		echo date("d/m/Y", $date);
			                	 ?></td>
			                	 <td>
			                	 	<a href="{{ route('pedido', ['id' => $pedido->id]) }}" class="link-det mr-1" role="button"><i class="fas fa-list"></i></a>
			                	 </td>
				            </tr>
			            @endforeach
		            @endforeach

		        </tbody>

		        <tfoot>
		            <tr class="text-center">
		                <th>Pedido</th>
		                <th>Data de emissão</th>
		                <th style="min-width: 170px; ">CNPJ Unidade</th>
		                <th>Código da unidade</th>
		                <th>Código do produto</th>
		                <th>Produto</th>
		                <th>Qtd</th>
		                <th>Data de envio</th>
		                <th></th>
		            </tr>
		        </tfoot>
		        
		    </table>

		</div>
	</div>

@endsection
