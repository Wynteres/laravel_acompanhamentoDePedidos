<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NF extends Model
{
	use SoftDeletes;
	
    protected $table = 'nfs';
    protected $dates = ['deleted_at'];

    public function entrega()
    {
        return $this->belongsTo('App\Models\Entrega')->withDefault();
    }
}
