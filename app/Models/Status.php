<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;

    protected $table = 'statuses';
    protected $dates = ['deleted_at'];

    public function item()
    {
        return $this->belongsTo('App\Models\Pedido')->withDefault();
    }
}
