@extends('layouts.app')

@section('content')
	@if($pedido)

	<div class="" style="margin-left: 20px" >
		<div class="panel panel-default">
	        <div class="panel-heading">
				<div class="row">
					<div class="col-4 align-left">
						<a href="{{ route('pedidos') }}" role="button" class="btn btn-danger" aria-expanded="false">
	                       <i class="fas fa-arrow-left"></i> Voltar
	                    </a>
                	</div>
                	<div class="col-4 text-center title">Pedido {{@$pedido['pedido_comprador'] }}</div>
            	</div>
        		<hr class="hr-section">
	        </div>
	        <div class="panel-body">
				<div class="pedido-wrapper">
					<!-- informacoes gerais do pedido -->
					<div class="page-header">
						<div class="row">
							<div class="col-4">
								<span>
									Emissão do pedido: <strong>{{@$pedido['data_emissao'] }}</strong>
								</span>
							</div>
							<div class="col-4 offset-4 text-right">
								<span>
									Pedido {{@$pedido->empresa['nome'] }}: <strong>{{@$pedido['pedido_vendedor'] }}</strong>
								</span>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-4">
								<span>
									Status: <strong>{{@$pedido->status['descricao'] }}</strong>
								</span>
							</div>
						</div>
					</div>
					<hr class="hr-section">
					<div class="row page-content">

						<!-- Tabela de itens -->
						<div class="col-12">							
					  		<table id="list-table" class="table table-striped table-bordered" style="width:100%">
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

						        	@foreach($pedido->itens as $iten)

						            <tr>
						                <td></td>
						                <td></td>
						                <td></td>
						                <td></td>
						                <td></td>
						                <td></td>
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
				</div>
			</div>
		</div>
	</div>
	@else
	<div class="panel panel-default">
  		<div class="panel-body">
	  		<span>nao temos nenhum pedido com esse numero =(</span>
		</div>
	</div>
	@endif

@endsection