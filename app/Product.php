<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $table = 'products';

    protected $guarded = [''];

    protected $fillable = [
    	'name', 'status', 'price', 'image', 'description', 'category_id', 'cate_parent'
    ];

    protected $dates = ['deleted_at'];

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
