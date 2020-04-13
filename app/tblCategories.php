<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblCategories extends Model
{
    public $table = 'categories';

    public function nameCateParent() {
    	return $this->belongsTo('App\Categories', 'cate_parent');
    }

    public function products() {
    	return $this->hasMany('App\Products', 'cate_id');
    }

    public function posts() {
    	return $this->hasMany('App\Posts', 'cate_id');
    }

    public function videos() {
    	return $this->hasMany('App\Videos', 'cate_id');
    }
}
