<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
    	'name', 'email', 'telephone', 'address', 'note', 'user_id', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }

    public function order_details()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
