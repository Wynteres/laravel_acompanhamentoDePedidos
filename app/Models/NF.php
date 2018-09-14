<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NF extends Model
{
	use SoftDeletes;
	
    protected $table = 'nfs';
    protected $dates = ['deleted_at'];


	public static function notExists($nf){
		$nfExistente = NF::where('numero', '=', $nf['numero'])->withTrashed()->first();
		if($nfExistente === null){
			return true;
		} else {
			return false;
		}
	}

    public function entrega()
    {
        return $this->belongsTo('App\Models\Entrega')->withDefault();
    }
}
