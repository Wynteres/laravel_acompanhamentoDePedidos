<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrazoEntrega extends Model
{
	use SoftDeletes;

    protected $table = 'prazo_entregas';
    protected $dates = ['deleted_at', 'data'];

	public function item()
	{
		return $this->belongsTo('App\Models\Item')->withDefault();
	}
}
