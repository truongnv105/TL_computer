<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'category_id', 'price', 'image', 'description', 'status',
        'item', 'promotion', 'color', 'warranty'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

    protected $guarded = [];


}
