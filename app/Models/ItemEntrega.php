<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemEntrega extends Model
{
    
	use SoftDeletes;

    protected $table = 'itens_entrega';
    protected $dates = ['deleted_at'];


	public function item()
	{
		return $this->hasOne('App\Models\Item', 'id', 'item_id');
	}

	public function entrega()
	{
		return $this->hasOne('App\Models\Entrega', 'entrega_id', 'id');
	}
}
