@extends('layouts.app')

@section('content')
	@if($pedido)

	<div class="" style="margin-left: 20px" >

		<div class="panel panel-default">
	        <div class="panel-heading">
				<div class="row">
					<div class="col-4 align-left">
						<a href="{{ route('pedidos') }}" role="button" class="btn btn-voltar" aria-expanded="false">
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
									Emissão do pedido: 
									<strong>
					                	<?php 
					                		$date = strtotime($pedido['data_emissao']);
					                		echo date("d/m/Y", $date);
					                	 ?>
									</strong>
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
							<div class="col-4 offset-4 text-right">

								@if(@$pedido->entregas->count() > 0)
								<span>
									Ver notas fiscais:<a href="{{ route('notas-fiscais-pedido', ['pedido' => $pedido->id]) }}" class="link-det ml-1 mr-1" role="button"><i class="fas fa-file-invoice-dollar"></i></a>
								</span>
								@endif

							</div>
						</div>
					</div>
					<hr class="hr-section">					
					<div class="row page-content">
						<div class="col-12">
							<ul class="nav nav-pills mb-3 col-12" id="pills-tab" role="tablist">
							  <li class="nav-item col-nav text-right">
							    <a class="nav-link active-left active" id="pills-itens-tab" data-toggle="pill" href="#pills-itens" role="tab" aria-controls="pills-itens" aria-selected="true">Itens</a>
							  </li>
							  <li class="nav-item col-nav">
							    <a class="nav-link active-right" id="pills-entregas-tab" data-toggle="pill" href="#pills-entregas" role="tab" aria-controls="pills-entregas" aria-selected="false">Entregas</a>
							  </li>
							</ul>
						</div>

						<div class="tab-content col-12" id="pills-tabContent">

							<!-- tabela para mostrar todos itens do pedido -->

						  <div class="tab-pane fade show active" id="pills-itens" role="tabpanel" aria-labelledby="pills-itens-tab">
						  	

								<!-- Tabela de itens -->
								<div class="col-12">							
							  		<table id="list-table" class="table table-striped table-bordered" style="width:100%">
								        <thead>
								            <tr>
								                <th>Código comprador</th>
								                <th>Código vendedor</th>
								                <th>Número do item</th>
								                <th>Descrição</th>
								                <th>Quantidade</th>
								                <th>Prazo de entrega</th>
								            </tr>
								        </thead>
								        <tbody>

								        	@foreach($pedido->itens as $item)

								            <tr>
								                <td>{{ @$item['codigo_comprador'] }}</td>
								                <td>{{ @$item['codigo_vendedor'] }}</td>
								                <td>{{ @$item['numero_item'] }}</td>
								                <td>{{ @$item['descricao'] }}</td>
								                <td>{{ @$item['quantidade'] }}</td>
								                <td>
								                	<?php 
								                		$date = strtotime($item->prazoEntrega['data']);
								                		echo date("d/m/Y", $date);
								                	 ?>								                	 	
							                	 </td>
								            </tr>

								            @endforeach

								        </tbody>

								        <tfoot>
								            <tr>
								                <th>Código comprador</th>
								                <th>Código vendedor</th>
								                <th>Número do item</th>
								                <th>Descrição</th>
								                <th>Quantidade</th>
								                <th>Prazo de entrega</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>

						  </div>

						  <!-- tabela para mostrar todas entregas e seus respectivos itens -->
						  <div class="tab-pane fade" id="pills-entregas" role="tabpanel" aria-labelledby="pills-entregas-tab">
						  	
							<!-- tabela para mostrar todos itens do pedido -->
					  		<div class="tab-pane fade show active" id="pills-itens" role="tabpanel" aria-labelledby="pills-itens-tab">

								<!-- Tabela de itens -->
								<div class="col-12">							
							  		<table id="list-table-entrega" class="table table-striped table-bordered" style="width:100%">
								        <thead>
								            <tr>
								                <th>Código comprador</th>
								                <th>Código vendedor</th>
								                <th>Número do item</th>
								                <th>Descrição</th>
								                <th>Quantidade <br> enviada</th>
								                <th>Previsão de envio</th>
								                <th>Lote de envio</th>
								                <th>Informações</th>
								            </tr>
								        </thead>
								        <tbody>
								        	<?php $loteEntrega = 0; ?>
								        	@foreach($pedido->entregas as $entrega)
								        		<?php $loteEntrega++; ?>

								        		@foreach($entrega->itensEntrega as $itemEntrega)
								        			
										            <tr>
										                <td>{{ @$itemEntrega->item['codigo_comprador'] }}</td>
										                <td>{{ @$itemEntrega->item['codigo_vendedor'] }}</td>
										                <td>{{ @$itemEntrega->item['numero_item'] }}</td>
										                <td>{{ @$itemEntrega->item['descricao'] }}</td>
										                <td>{{ @$itemEntrega['quantidade'] }}</td>
										                <td>
										                	<?php 
										                		$date = strtotime($itemEntrega->item->prazoEntrega['data']);
										                		echo date("d/m/Y", $date);
										                	 ?>
									                	</td>
										                <td> {{@$loteEntrega}} </td>
										                <td class="custom-buttons text-center">
										                	<a href="{{ route('notas-fiscais', ['pedido' => $pedido->id, 'entrega' => $entrega->id]) }}" class="link-det mr-1" role="button"><i class="fas fa-file-invoice-dollar"></i></a>
	                										<a disabled class="link-delivery" role="button"><i class="fas fa-truck"></i></a>
										                	
										                </td>
										            </tr>
								            	@endforeach
								            @endforeach

								        </tbody>

								        <tfoot>
								            <tr>
								                <th>Código comprador</th>
								                <th>Código vendedor</th>
								                <th>Número do item</th>
								                <th>Descrição</th>
								                <th>Quantidade <br> enviada</th>
								                <th>Previsão de envio</th>
								                <th>Lote de envio</th>
								                <th>Informações</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
						  	</div>
						  </div>
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