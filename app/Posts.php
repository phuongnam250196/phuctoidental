<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    public function categories() {
    	return $this->belongsTo('App\Categories', 'cate_id');
    }
}
