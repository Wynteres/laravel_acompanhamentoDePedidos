<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
	use SoftDeletes;

    protected $table = 'pedidos';
    protected $dates = ['deleted_at'];
	protected $fillable = ['pedido_id'];

	public static function notExists($pedido){

		$pedidoExistente = Pedido::where('pedido_vendedor', '=', $pedido['pedido_vendedor'])->whereYear('data_emissao', '=', $pedido['data_emissao'])->withTrashed()->first();

		if($pedidoExistente === null){
			return true;
		} else {
			return false;
		}
	}

	public function entregue(){
		$entregue = true;

		foreach ($this->itens as $item)
		{	
			$quantidadeEntregue = 0;
			foreach($this->itensEntregas()->where('item_id', '=', $item['id']) as $itemEntregue)
			{
				$quantidadeEntregue += $itemEntregue['quantidade'];
			}

			if($quantidadeEntregue < $item['quantidade'])
			{
				$entregue = false;
			}
		}

		return $entregue;
	}

	public function prazoEntrega()
    {
        return $this->hasManyThrough('App\Models\PrazoEntrega', 'App\Models\Item')->orderByRaw('data DESC')->first();
    }


	public function itensEntregas()
	{
		return $this->hasManyThrough('App\Models\ItemEntrega', 'App\Models\Entrega')->get();
	}

	public function itens()
	{
		return $this->hasMany('App\Models\Item', 'pedido_id', 'id');
	}

	public function entregas()
	{
		return $this->hasMany('App\Models\Entrega', 'pedido_id', 'id');
	}

	public function empresa()
	{
		return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
	}

	public function status()
	{
		return $this->hasOne('App\Models\Status', 'id', 'status_id');
	}
}
