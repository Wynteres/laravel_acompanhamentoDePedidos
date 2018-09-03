@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
        <div class="panel-heading">
			<div class="row mb-4">
            	<div class="col-4 offset-4 text-center title">Ajuda</div>
        	</div>
    		<hr class="hr-section">
        </div>
        <div class="panel-body help mt-4">

        	<div class="row">
        		<ul class="topics">
        			<li><a href="#pedidos">1. Pedidos</a></li>
        			<li><a href="#arquivo">2. Pedidos arquivados</a></li>
        			<li><a href="#itens">3. Itens comprados</a></li>
        			<li><a href="#entregas">4. Entregas</a></li>
        			<li><a href="#notas-fiscais">5. Notas fiscais</a></li>
        		</ul>
        	</div>
            <div class="row mt-4 text-center">
                <div id="pedidos" class="col-12"><h3>Pedidos</h3></div>
                <div class="col-8 text-justify">
                    <span>
                        Nessa tela é possivel acompanhar os <strong>pedidos realizados</strong>, sendo possivel acessar a lista de <strong>itens</strong> deste pedido clicando no icone <i style="color: #8BC34A" class="fas fa-list"></i>, ou <strong>arquivar</strong> o pedido caso não seja mais necessário que ele apareça <strong>nesta</strong> listagem principal através do botao  <i class="fas fa-box" style="color: red"></i>. 
                    </span>
                    <br>
                    <span>
                        Ao clicar <strong>sobre</strong> o nome de uma <strong>coluna</strong> da tabela, os itens se organizarão. Também é possivel realizar <strong>pesquisas</strong> utilizando o campo localizado na <strong>direita superior</strong> da tabela de pedidos. Por fim, o campo selecionável no canto esquerdo superior da tabela serve para escolher a quantidade de <strong>linhas</strong> exibidas em cada página.
                    </span>
                    <br>
                    <span>Estas caracteristicas podem ser vistas em todas tabelas de informações.</span>
                </div>


                <div id="arquivo" class="col-12 mt-5"><h3>Pedidos Arquivados</h3></div>
                <div class="col-8 offset-4 text-justify">
                    <span>
                        É possivel acessar esta tela através do menu lateral <strong>"pedidos" -> "Pedidos arquivados"</strong>. Diferente da página inicial pode-se ser consultados os pedidos realizados <strong> já arquivados</strong>, sendo possivel acessar a lista de <strong>itens</strong> deste pedido clicando no icone <i style="color: #8BC34A" class="fas fa-list"></i>, ou <strong>desarquivar</strong> o pedido caso não seja mais necessário que ele apareça <strong>nesta</strong> listagem principal através do botao  <i class="fas fa-box" style="color: red"></i>. 
                    </span>
                    <br>
                    <span>
                        Ao clicar <strong>sobre</strong> o nome de uma <strong>coluna</strong> da tabela, os itens se organizarão. Também é possivel realizar <strong>pesquisas</strong> utilizando o campo localizado na <strong>direita superior</strong> da tabela de pedidos. Por fim, o campo selecionável no canto esquerdo superior da tabela serve para escolher a quantidade de <strong>linhas</strong> exibidas em cada página.
                    </span>
                    <br>
                    <span>Estas caracteristicas podem ser vistas em todas tabelas de informações.</span>
                </div>


                <div id="itens" class="col-12 mt-5"><h3>Itens comprados</h3></div>
                <div class="col-8 text-justify">
                    <span>
                        Nesta tela podemos ver com mais detalhes o pedido de compra, sendo possivel conferir o <strong> número de pedido</strong> no <strong>topo</strong> da página, ao lado <strong>esquerdo</strong> há um botão para <strong> voltar para tela anterior</strong> com todos pedidos de compras ativos. Em seguida podemos ver a data de emissão do pedido pela <strong>mogiglass</strong>, o número do pedido da <strong>mogiglass</strong> e o <strong>status</strong> atual do pedido, podendo este ser <strong>"em processamento"</strong>, <strong>"aguardando produtos</strong> ou <strong> "enviado"</strong>.<br>
                    </span>
                    <span>
                        Contamos com uma tabela listando os itens da compra. Ao clicar <strong>sobre</strong> o nome de uma <strong>coluna</strong> da tabela, os itens se organizarão. Também é possivel realizar <strong>pesquisas</strong> utilizando o campo localizado na <strong>direita superior</strong> da tabela de pedidos. Por fim, o campo selecionável no canto esquerdo superior da tabela serve para escolher a quantidade de <strong>linhas</strong> exibidas em cada página.
                    </span>
                </div>


                <div id="entregas" class="col-12 mt-5"><h3>Itens comprados</h3></div>
                <div class="col-8 offset-4 text-justify">
                    <span>
                        Podemos selecionar a visualização dos itens por completo na aba <strong>"itens"</strong> (já padrão), e os itens entregues(ou enviados para entrega) na aba <strong>"Entregas"</strong>. Sendo possivel pela aba <strong>entregas</strong> visualizar as notas fiscais das entregas (com todos itens desta entrega) e os códigos de rastreio de cada entrega.
                    </span>
                </div>
            </div>
		</div>
	</div>

@endsection


                    
