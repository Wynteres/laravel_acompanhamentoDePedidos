<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes;

    protected $table = 'itens';
    protected $dates = ['deleted_at'];

    public function prazoEntrega()
    {
        return $this->hasOne('App\Models\PrazoEntrega', 'item_id', 'id');
    }


    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido')->withDefault();
    }
}
