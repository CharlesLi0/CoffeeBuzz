<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $guarded=[];

   	public function customer()
	{
	    return $this->belongsTo('App\Http\Models\Customer', 'customer_id');
	}
	
   	public function Products()
	{
	    return $this->belongsToMany('App\Http\Models\Product', 'order_product', 'order_id', 'product_id');
	}
}