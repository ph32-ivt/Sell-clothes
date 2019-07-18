<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
    	'name', 'status', 'price', 'description', 'size', 'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function images()
    {
    	return $this->hasMany('App\Image');
    }

    public function promotions()
    {
    	return $this->belongsToMany('App\Promotion');
    }

    public function sizes()
    {
    	return $this->belongsToMany('App\Size');
    }
}
