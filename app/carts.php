<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    protected $table = 'carts';

    public function products() {
    	return $this->belongsTo('App\Products', 'product_id');
    }
}
