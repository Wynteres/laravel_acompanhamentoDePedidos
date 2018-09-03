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
