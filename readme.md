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