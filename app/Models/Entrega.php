<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrega extends Model
{
	use SoftDeletes;
    protected $table = 'entregas';
    protected $dates = ['deleted_at'];

    public function nfs()
    {
        return $this->hasMany('App\Models\NF', 'entrega_id', 'id');
    }

    public function dataEnvio()
    {
        return $this->hasMany('App\Models\NF', 'entrega_id', 'id')->orderByRaw('data_emissao DESC');
    }

    public function itensEntrega()
    {
        return $this->hasMany('App\Models\ItemEntrega', 'entrega_id', 'id');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido')->withDefault();
    }

    public function transportadora()
    {
        return $this->hasOne('App\Models\Entrega', 'id', 'transportadora_id');
    }


    public static function linkRastreio($entregaTemp)
    {
        $entrega = Entrega::where('id' , '=', $entregaTemp['id'])->first();

        $transportadora = Transportadora::where('id', '=', $entrega['transportadora_id'])->first();
        $transportadoraUrl = $transportadora['url'];
        $pedido = Pedido::where('id', '=', $entrega['pedido_id'])->first();
        $cnpjComprador = Empresa::where('id', '=', $pedido['comprador_id'])->first()['cnpj'];
        $cnpjVendedor = Empresa::where('id', '=', $pedido['empresa_id'])->first()['cnpj'];
        $nfNum = NF::where('entrega_id', '=', $entrega['id'])->first()['numero'];

        $transportadoraUrl = str_replace("[nfnum]", $nfNum, $transportadoraUrl);
        $transportadoraUrl = str_replace("[cnpjvendedor]", str_replace(['.','/','-'], "", $cnpjVendedor), $transportadoraUrl);
        $transportadora['url'] = str_replace("[cnpjcomprador]", str_replace(['.','/','-'], "", $cnpjVendedor), $transportadoraUrl);

        return $transportadora;
    }
}
