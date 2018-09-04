@extends('layouts.app')

@section('content')
	<div class="" style="margin-left: 20px" >

		<div class="panel panel-default">
	        <div class="panel-heading">
				<div class="row">
					<div class="col-4 align-left">
						<a href="{{ route('pedido', ['id' => $pedido->id]) }}" role="button" class="btn btn-voltar" aria-expanded="false">
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
							<?php $counter = 0 ?>
							@if(count(@$pedido->entregas) > 0)
							@foreach(@$pedido->entregas as $entrega)
								@if(count($entrega->nfs) > 0)
								@foreach($entrega->nfs as $nf)
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
													<a id="chave-acesso" href="http://www.nfe.fazenda.gov.br/portal/consultaRecaptcha.aspx?tipoConsulta=completa&tipoConteudo=XbSeqxE8pl8=" target="_BLANK" onclick="copyToClipboard()">
														{{ $nf['chave'] }}
													</a>
												</strong>
											</span>
											
										</div>
										<div class="col-6 mt-3">
											<span>
												Download do arquivo:
												<a target="_BLANK" href="#">
													<i class="fas fa-file-download"> Download</i>
												</a>
											</span>
											
										</div>
									</div>
									<hr class="hr-section">
								@endforeach
								@else
									<?php $counter++ ?>
								@endif
							@endforeach
							@else
								@if($counter > 0)
							  		<span>parece que não temos nenhuma nota fiscal para esse pedido =(</span>
						  		@else
									<span>parece que não temos nenhuma nota fiscal para esse pedido =(</span>
								@endif
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection