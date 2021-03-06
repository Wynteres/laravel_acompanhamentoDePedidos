@extends('layouts.app')

@section('content')

		<div class="panel panel-default">
	        <div class="panel-heading">
				<div class="row mb-4">
                	<div class="col-4 offset-4 text-center title">Pedidos de compra</div>
            	</div>
        		<hr class="hr-section">
	        </div>
	        <div class="panel-body  mt-4">
	  		<table id="list-table" class="table display table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr class="text-center">
		                <th>Status</th>
		                <th>CNPJ da unidade</th>
		                <th>Cod. da unidade</th>
		                <th>Número do pedido</th>
		                <th>Data de emissão</th>
		                <th>Prazo de entrega</th>
		                <th>Vendedor</th>
		                <th></th>
		            </tr>
		        </thead>
		        <tbody>

		        	@foreach($pedidos as $pedido)


			            <tr>
			                <td>{{ $pedido->status['descricao'] }}</td>
			                <td>{{ $pedido->comprador['cnpj'] }}</td>
			                <td>{{ $pedido->comprador['codigo_unidade'] }}</td>
			                <td>{{ $pedido['pedido_comprador'] }}</td>
			                <td><?php 
			                		$date = strtotime($pedido['data_emissao']);
			                		echo date("d/m/Y", $date);
			                	 ?></td>
			                <td><?php 
			                		$date = strtotime($pedido->prazoEntrega()['data']);
			                		echo date("d/m/Y", $date);
			                	 ?></td>

			                <td>{{ $pedido->empresa['nome'] }}</td>
			                
			                <td class="custom-buttons text-center">
				                	<a  href="{{ route('pedido', ['id' => $pedido->id]) }}" class="link-det" role="button" title="Ver pedido"><i class="fas fa-list"></i></a>

				                	<form action="{{ route('pedido-delete', ['pedido' => $pedido->id]) }}" method="post">
									    {!! method_field('delete') !!}
	    								{!! csrf_field() !!}
									    <button  class="link-archive" title="Arquivar pedido" type="submit"><i class="fas fa-box"></i></button>
									</form>
								</div>

			                </td>
			            </tr>

		            @endforeach

		        </tbody>

		        <tfoot>
		            <tr class="text-center">
		                <th>Status</th>
		                <th>CNPJ da unidade</th>
		                <th>Cod. da unidade</th>
		                <th>Número do pedido</th>
		                <th>Data de emissão</th>
		                <th>Prazo de entrega</th>
		                <th>Vendedor</th>
		                <th></th>
		            </tr>
	            </tfoot>
		    </table>

		</div>
	</div>

@endsection
