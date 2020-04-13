<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';

    public function categories() {
    	return $this->belongsTo('App\tblCategories', 'cate_id');
    }
}
