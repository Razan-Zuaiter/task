<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $primaryKey = 'pro_id';
    public $timestamps = true;

    public function category(){
        return $this->belongsTo('App\Category','cat_id');
    }
}
