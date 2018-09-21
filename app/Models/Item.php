<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes
;
    protected $table = 'itens';
    protected $dates = ['deleted_at'];


    public static function notExists($item, $pedidoID){

        $itemExistente = Item::where('numero_item', '=', $item['numeroItem'])->where('pedido_id', '=', $pedidoID)->withTrashed()->first();

        if($itemExistente === null){
            return true;
        } else {
            return false;
        }
    }

    public static function getExistingItem($item, $pedidoID){

        return Item::where('numero_item', '=', $item['numeroItem'])->where('pedido_id', '=', $pedidoID)->withTrashed()->first();
        
    }

    public function prazoEntrega()
    {
        return $this->hasOne('App\Models\PrazoEntrega', 'item_id', 'id')->first();
    }


    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido')->withDefault();
    }
}
