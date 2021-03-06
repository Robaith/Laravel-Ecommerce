<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Category;

class Subcategory extends Model
{
    protected $fillable = [
            'category_id', 'subcategory_name'
        ];

    public function category(){
    	return $this->belongsTo('App\Model\Admin\Category');
    }
}
