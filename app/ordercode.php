<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordercode extends Model
{
    protected $table = 'ordercode';

    public function users() {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function orders() {
    	return $this->hasMany('App\orders', 'order_id');
    }
}
