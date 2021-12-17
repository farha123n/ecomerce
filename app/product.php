<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $primaryKey = 'product_row_id'; 
    public function getCategory(){
   		return $this->hasOne('App\Models\Category', 'category_row_id', 'category_row_id');
   	}
}
