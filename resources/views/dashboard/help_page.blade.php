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
                        <ul>
                            <li><a href="#1.1-funcionalidades">1.1 Funcionalidades</a></li>
                            <li><a href="#1.2-tabela">1.2 Tabela</a></li>
                        </ul>
        			<li><a href="#arquivo">2. Pedidos arquivados</a></li>
                        <ul>
                            <li><a href="#2.1-acesso">2.1 Acesso</a></li>
                            <li><a href="#2.2-funcionalidades">2.2 Funcionalidades</a></li>
                        </ul>
        			<li><a href="#itens">3. Itens comprados</a></li>
                    <ul>
                        <li><a href="#3.1-informações">3.1 Informações</a></li>
                        <li><a href="#3.2-tabela">3.2 Tabela</a></li>
                    </ul>
        			<li><a href="#entregas">4. Entregas</a></li>
        			<li><a href="#notas-fiscais">5. Notas fiscais</a></li>
                    <ul>
                        <li><a href="#5.1-acesso">5.1 Acesso</a></li>
                        <li><a href="#5.2-funcionalidades">5.2 Funcionalidades</a></li>
                    </ul>
        		</ul>
        	</div>
            <div class="row mt-4 text-center">
                <div id="pedidos" class="col-12"><h3>1. Pedidos</h3>
                    <hr class="hr-section">
                </div>
                <div class="col-8 text-justify">
                    <h5 class="mt-2" id="1.1-funcionalidades">1.1 Funcionalidades</h5>
                    <span>
                        Nessa tela é possivel acompanhar os <strong>pedidos realizados</strong>, sendo possivel acessar a lista de <strong>itens</strong> deste pedido clicando no icone <i style="color: #8BC34A" class="fas fa-list"></i>, ou <strong>arquivar</strong> o pedido caso não seja mais necessário que ele apareça <strong>nesta</strong> listagem principal através do botao  <i class="fas fa-box" style="color: red"></i>. 
                    </span>
                    <br>
                    <h5 class="mt-2" id="1.2-tabela" ">1.2 Tabela</h5>
                    <span>
                        Ao clicar <strong>sobre</strong> o nome de uma <strong>coluna</strong> da tabela, os itens se organizarão. Também é possivel realizar <strong>pesquisas</strong> utilizando o campo localizado na <strong>direita superior</strong> da tabela de pedidos. Por fim, o campo selecionável no canto esquerdo superior da tabela serve para escolher a quantidade de <strong>linhas</strong> exibidas em cada página.
                    </span>
                    <br>
                    <span>Estas caracteristicas podem ser vistas em todas tabelas de informações.</span>
                </div>


                <div id="arquivo" class="col-12 mt-5"><h3>2. Pedidos Arquivados</h3>
                    <hr class="hr-section">
                </div>
                <div class="col-8 offset-4 text-justify">
                    <h5 class="mt-2" id="2.1-acesso">2.1 Acesso</h5>
                    <span>
                        É possivel acessar esta tela através do menu lateral <strong>"pedidos" -> "Pedidos arquivados"</strong>. Diferente da página inicial pode-se ser consultados os pedidos realizados <strong> já arquivados</strong>, sendo possivel acessar a lista de <strong>itens</strong> deste pedido clicando no icone <i style="color: #8BC34A" class="fas fa-list"></i>, ou <strong>desarquivar</strong> o pedido caso não seja mais necessário que ele apareça <strong>nesta</strong> listagem principal através do botao  <i class="fas fa-box" style="color: red"></i>. 
                    </span>
                    <br>
                    <h5 class="mt-2" id="2.2-funcionalidades" ">2.2 Funcionalidades</h5>
                    <span>
                        Ao clicar <strong>sobre</strong> o nome de uma <strong>coluna</strong> da tabela, os itens se organizarão. Também é possivel realizar <strong>pesquisas</strong> utilizando o campo localizado na <strong>direita superior</strong> da tabela de pedidos. Por fim, o campo selecionável no canto esquerdo superior da tabela serve para escolher a quantidade de <strong>linhas</strong> exibidas em cada página.
                    </span>
                    <br>
                    <span>Estas caracteristicas podem ser vistas em todas tabelas de informações.</span>
                </div>


                <div id="itens" class="col-12 mt-5"><h3>3. Itens comprados</h3>
                    <hr class="hr-section">
                </div>
                <div class="col-8 text-justify">
                    <h5 class="mt-2" id="3.1-informações">3.1 Informações</h5>
                    <span>
                        Nesta tela podemos ver com mais detalhes o pedido de compra, sendo possivel conferir o <strong> número de pedido</strong> no <strong>topo</strong> da página, ao lado <strong>esquerdo</strong> há um botão para <strong> voltar para tela anterior</strong> com todos pedidos de compras ativos. Em seguida podemos ver a data de emissão do pedido pela <strong>mogiglass</strong>, o número do pedido da <strong>mogiglass</strong> e o <strong>status</strong> atual do pedido, podendo este ser <strong>"em processamento"</strong>, <strong>"aguardando produtos</strong> ou <strong> "enviado"</strong>.
                    </span>
                    <br>
                    <h5 class="mt-2" id="3.2-tabela">3.2 Tabela</h5>
                    <span>
                        Contamos com uma tabela listando os itens da compra. Ao clicar <strong>sobre</strong> o nome de uma <strong>coluna</strong> da tabela, os itens se organizarão. Também é possivel realizar <strong>pesquisas</strong> utilizando o campo localizado na <strong>direita superior</strong> da tabela de pedidos. Por fim, o campo selecionável no canto esquerdo superior da tabela serve para escolher a quantidade de <strong>linhas</strong> exibidas em cada página.
                    </span>
                </div>


                <div id="entregas" class="col-12 mt-5"><h3>4. Entregas</h3>
                <hr class="hr-section">
                </div>
                <div class="col-8 offset-4 text-justify">
                    <span>
                        Podemos selecionar a visualização dos itens por completo na aba <strong>"itens"</strong> dentro do detalhe do <strong><a href="#pedidos">pedido</a></strong>, e os itens entregues(ou enviados para entrega) na aba <strong>"Entregas"</strong>. Sendo possivel pela aba <strong>entregas</strong> visualizar as notas fiscais das entregas (com todos itens desta entrega) e os códigos de rastreio de cada entrega.
                    </span>
                </div>

                <div id="notas-fiscais" class="col-12 mt-5"><h3>5. Notas Fiscais</h3>
                    <hr class="hr-section">
                </div>
                <div class="col-8 text-justify">
                    <h5 class="mt-2" id="5.1-acesso">5.1 Acesso</h5>
                    <span>
                        Podemos ter acesso as notas fiscais dos pedidos através da tela de  <strong>entregas</strong> ou da tela de <strong>itens do pedido</strong>, através do ícone <i class="fas fa-file-invoice-dollar" style="color: #8BC34A"></i> localizano no final das linhas da tabela na tela de <strong>entregas</strong> ou no canto superior direito, abaixo do número do pedido da empresa vendedora, também com o mesmo ícone.
                    </span>
                    <br>
                    <h5 class="mt-2" id="5.2-funcionalidades">5.2 Funcionalidades</h5>
                    <span>
                        Temos acesso a informações da nota como seu <strong>Número</strong>, data de emissão, <strong>chave de acesso</strong> e download do arquivo. O campo <strong>chave de acesso</strong> é um link que leva para a consulta do site da secretaria da fazenda, ao <strong> clicar no link </strong> a chave de acesso será <strong>copiada automaticamente</strong> para o site da secretaria da fazenda, sendo necessario preencher o captcha para acessar a nota fiscal.
                        O <strong>download</strong> do XML da nota fiscal pode ser realizado clicando no botao "download".
                    </span>
                </div>
            </div>
		</div>
	</div>

@endsection


                    
