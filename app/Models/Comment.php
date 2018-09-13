<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['com_id'];

    public function products(){
        return $this->belongsTo('App\Models\Products');
    }

    protected $guarded = [];
}
