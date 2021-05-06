<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $guarded=[];
    
    
    public function orders()
    {
        return $this->hasMany('App\Http\Models\Order', 'customer_id', 'id');
    }
}
