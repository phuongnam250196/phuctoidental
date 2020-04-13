<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';

    public function users() {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function orders() {
    	return $this->belongsTo('App\ordercode', 'order_id');
    }

    public function products() {
    	return $this->belongsTo('App\Products', 'product_id');
    }
}
