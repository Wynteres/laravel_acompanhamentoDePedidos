<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportadora extends Model
{
	use SoftDeletes;

    protected $table = 'transportadoras';

    protected $dates = ['deleted_at'];


    public function entregas()
    {
        return $this->hasMany('App\Models\Entrega')->withDefault();
    }
    
}
