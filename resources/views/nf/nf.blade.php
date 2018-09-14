@extends('layouts.app')

@section('content')
	@if($nfs)

	<div class="" style="margin-left: 20px" >

		<div class="panel panel-default">
	        <div class="panel-heading">
				<div class="row">
					<div class="col-4 align-left">
						<a href="{{ url()->previous() }}" role="button" class="btn btn-voltar" aria-expanded="false">
	                       <i class="fas fa-arrow-left"></i> Voltar
	                    </a>
                	</div>
                	<div class="col-4 text-center title">Notas fiscais - pedido {{ @$pedido['pedido_comprador'] }}</div>
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
									Pedido {{ $pedido->empresa['nome'] }}: <strong>{{ $pedido['pedido_vendedor'] }}</strong>
								</span>
							</div>
						</div>
					</div>
					<hr class="hr-section">					
					<div class="row page-content">
						<div class="col-12">

							@foreach($nfs as $nf)
							<div class="row">
								<div class="col-6">
									<span>
										Número Nota fiscal: 
										<strong>{{ $nf['numero'] }}</strong>
									</span>
								</div>
								<div class="col-6">
									<span>
										Data de emissão: 
										<strong>

						                	<?php 
						                		$date = strtotime($nf['data_emissao']);
						                		echo date("d/m/Y", $date);
						                	 ?>

										</strong>
									</span>
									
								</div>
								<div class="col-6 mt-3">
									<span>
										Chave de acesso:
										<strong>
											<a id="chave-acesso" href="http://www.nfe.fazenda.gov.br/portal/consultaRecaptcha.aspx?tipoConsulta=completa&tipoConteudo=XbSeqxE8pl8=&nfe={{ $nf['chave'] }}" target="_BLANK">
												{{ $nf['chave'] }}
											</a>
										</strong>
									</span>
									
								</div>
								<div class="col-6 mt-3">
									<span>
										Download do arquivo:
										<a target="_BLANK" download href="{{ Storage::url($nf['caminho_xml']) }}">
											<i class="fas fa-file-download"> Download</i>
										</a>
									</span>
									
								</div>
							</div>
							<hr class="hr-section">
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@else
	<div class="panel panel-default">
  		<div class="panel-body">
	  		<span>nao temos nenhuma nota fiscal aqui nesse link =(</span>
		</div>
	</div>
	@endif

@endsection