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
}
