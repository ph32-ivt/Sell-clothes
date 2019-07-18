<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
    	'title', 'rate', 'content', 'status', 'product_id'
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
