<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
    	'name', 'telephone', 'address', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function order_details()
    {
    	return $this->hasMany('App\Order_detail');
    }
}
