<?php

use Illuminate\Database\Seeder;
use App\Models\Transportadora;

class transportadoras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transportadoras')->insert([
            [
                'cnpj' => '01.610.798/0001-56 **',
                'url' => 'http://acomp.tecmartransportes.com.br:8080/smonet.web/consulta/consulta.html?notafiscal=[nfnum]&cnpjremetente=[cnpjvendedor]',
            ], 
            [
            	'cnpj' => '20.147.617/0022-76',
                'url' => 'http://www.jamef.com.br/jamef/ocorrenciaViagem.do?request=rastreamentoSite&tipo_cnpj=remet&txtCnpj=[cnpjvendedor]&tipo_pesquisa=nf&txtNumDoc=[nfnum]&salvar=',
            ],
            [
            	'cnpj' => '82.110.818/0003-93',
                'url' => 'http://www.alfatransportes.com.br/sistema/rastro.php?rem=[cnpjvendedor]&des=&nota=[nfnum]',
            ],
            [
            	'cnpj' => '19.451.038/0020-71',
                'url' => 'http://www.ssw.inf.br/ssw_resultSSW.asp?NR=[nfnum]&cnpj=[cnpjvendedor]&urlori=http%3A%2F%2Fwww.camilodossantos.com.br%2Frastreamento&sigla_emp=RCS',
            ],
            [
            	'cnpj' => '19.451.038/0001-09',
                'url' => 'http://www.ssw.inf.br/ssw_resultSSW.asp?NR=[nfnum]&cnpj=[cnpjvendedor]&urlori=http%3A%2F%2Fwww.camilodossantos.com.br%2Frastreamento&sigla_emp=RCS',
            ],
            [
            	'cnpj' => '29.291.184/0006-82',
                'url' => 'http://www.ssw.inf.br/ssw_resultSSW.asp?NR=[nfnum]&cnpj=[cnpjvendedor]&urlori=http%3A%2F%2Fwww.camilodossantos.com.br%2Frastreamento&sigla_emp=RCS',
            ],
            [
            	'cnpj' => '25.335.282/0003-70',
                'url' => 'http://www.ssw.inf.br/ssw_resultSSW.asp?NR=[nfnum]&cnpj=[cnpjvendedor]&urlori=http%3A%2F%2Fwww.camilodossantos.com.br%2Frastreamento&sigla_emp=RCS',
            ],
            [
            	'cnpj' => '95.591.723/0081-01',
                'url' => 'http://radar.tntbrasil.com.br/radar/public/localizacaoSimplificada?nrIdentificacao=[cnpjremetente]&nrDocumento=[nfnum]',
            ]
        ]);
    }
}
