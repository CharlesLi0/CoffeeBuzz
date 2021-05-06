<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $guarded=[];

	public function Orders()
	{
	    return $this->belongsToMany('App\Http\Models\Order', 'order_product', 'order_id', 'product_id');
	    
	}
}