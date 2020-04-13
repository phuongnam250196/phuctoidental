<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';

    public function categories() {
    	return $this->belongsTo('App\Categories', 'cate_id');
    }
    public function views() {
    	return $this->hasOne('App\views', 'other_id')->where('type', 'product')->orderBy('count', 'desc');
    }
}
