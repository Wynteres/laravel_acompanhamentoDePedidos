<p align="center"><img src="http://www.mogiglass.com.br/shop/skin/frontend/base/default/images/mogiglass_logo.png"></p>


## Sobre PAI - Painel de acompanhamento integrado

O Pai é uma iniciativa interna para que os clientes de contratos possam ter uma visão transparente do estado de seus pedidos, da emissão até a entrega. Podendo acompanhar rastreio, emissão de notas fiscais e pendencias.

## Funcionamento geral

O sistema PAI é primariamente para acompanhamento por parte do cliente. Não há áreas de cadastro/inserção de informação manual. Através do painel é possivel acessar todos pedidos inseridos, gerar relatórios de pendencias e envios, acessar páginas de rastreio das empresas que disponibilizam, ver as notas ficais e baixar XML's. 
Entretanto, o envio de informações é feito exclusivamente pelos endpoints da API, sendo possivel inserir informações através de **requests** em **json**.

## Iniciando a aplicação

A aplicação PAI é em seu todo, simples, sendo necessário pouca preparação para seu uso.
- Clone o repositório no local desejado para armazenamento da aplicação.
- Configure o arquivo **.env** para seu ambiente.
- Configure o banco de dados no arquivo **config/database.php**.
- Inicie o servidor Artisan.
- faça o comando **"php artisan migrate".**
- Faça o comando **"php artisan db:seed"**
- Pronto, o sistema está operando. 

## Recusos e caracteristicas

O PAI conta com 2 endpoints para cadastro e atualização, um para pedidos e um para entregas. 

### Endpoint para Pedido

O endpoint para cadastro/atualização de pedido recebe um **json** com os dados de pedido, itens e empresa compradora. Seguindo os seguintes passos:

1. Verifica se o comprador já está cadastrado.
	1. Se estiver cadastrado, atualiza o cadastro.
	1. Caso contrário, ele persiste no banco o novo registro.
1. Verifica se o pedido existe:
	1. Se NÃO existe, persiste as informações do pedido e todos itens.
	1. Se existe:
		1. atualiza as informações de pedido.
		1. Verifica se os itens existem:
			1. Se sim, atualiza o item.
			1. Se não, persiste o novo item.


Os retornos desse endpoint são:
 - 201:'Pedido Criado' caso o pedido for novo
 - 201:'Pedido atalizado' caso já exista e alguma informação for atualizada
 - 200:'Pedido finalizado' se já estiver com o status "Enviado".

### Endpoint para Entregas

O cadastro/atualização de entregass se dá pelo endpoint de NF, uma vez que a entrega é criada em cima da nota fiscal existente. Sendo assim, o controlador age da seguinte forma:

1. Verifica se pedido existe.
1. Cria uma nova entrega.
1. Itera para cada nota fiscal desta entrega (caso seja entrega futura há mais de uma):
1. Verifica se a nota fiscal existe:
	1. Se sim:
		1. Salva o arquivos xml.
		1. Salva nota fiscal.
		1. Adiciona item entregue.
		1. Verifica se todos itens foram entregues
		1. Altera o sttus para 'aguardando material' ou 'finalizado'
	1. Se não, finaliza. 

 
Os retornos desse endpoint são:
 - 201:'Entrega Criada' caso seja uma nova entrega
 - 200:'Nota Fiscal já existente' se já existir a entrega.