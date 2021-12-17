<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;   

class Product extends Model
{
   protected $primaryKey = 'product_row_id';  

   	public function getCategory(){
   		return $this->hasOne('App\Models\Category', 'category_row_id', 'category_row_id');
   	}
}
