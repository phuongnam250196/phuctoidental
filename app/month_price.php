<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class month_price extends Model
{
    protected $table = 'month_prices';

    public function room_price() {
    	return $this->hasMany('App\room_price', 'month_id');
    }
}
