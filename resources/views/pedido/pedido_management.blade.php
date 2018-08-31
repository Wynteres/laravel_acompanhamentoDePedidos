@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
  		<div class="panel-body">

	  		<table id="list-table" class="table display table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		                <th>Status</th>
		                <th>Número Comprador</th>
		                <th>Número Vendedor</th>
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
		                <td>{{ $pedido['pedido_comprador'] }}</td>
		                <td>{{ $pedido['pedido_mogiglass'] }}</td>
		                <td>{{ $pedido['data_emissao'] }}</td>
		                <td>Prazo de entrega</td>
		                <td>{{ $pedido->empresa['nome'] }}</td>
		                <td class="custom-buttons text-center">
		                	<a href="{{ route('pedido', ['id' => $pedido->id]) }}" class="link-det" role="button"><i class="fas fa-eye "></i></a>
		                	<a href="#" class="link-archive" role="button"><i class="fas fa-archive "></i></a>
		                </td>
		            </tr>

		            @endforeach

		        </tbody>

		        <tfoot>
		            <tr>
		                <th>Status</th>
		                <th>Número Comprador</th>
		                <th>Número Vendedor</th>
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
