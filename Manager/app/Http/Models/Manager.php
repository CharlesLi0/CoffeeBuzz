<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'managers';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $guarded=[];
}