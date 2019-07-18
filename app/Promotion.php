<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
    	'name', 'code', 'unit', 'start_day', 'end_day'
    ];

    public function products()
    {
    	return $this->belongsToMany('App\Product');
    }
}
