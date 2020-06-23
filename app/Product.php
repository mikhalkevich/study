<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name',
        'catalog_id',
        'user_id',
        'price',
        'body',
        'smallbody',
        'picture',
        'status'];
    protected function catalogs(){
        return $this->belongsTo('App\Catalog','catalog_id');
    }
}
