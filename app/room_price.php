<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_price extends Model
{
    protected $table = 'room_prices';

    public function month_price() {
    	return $this->belongsTo('App\month_price', 'month_id');
    }
}
