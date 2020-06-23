<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //protected $table = 'catalogs';
    //protected $primaryKey = 'id';
    //protected $keyType = 'string';
    //protected $incrementing = false;
    //protected $timestamps = false;
    //const CREATED_AT = 'created_date';
    //const UPDATED_AT = 'updated_date';
    //protected $connection = 'mysql';
    protected $fillable = ['name'];
    public function products(){
        return $this->hasMany('App\Product','catalog_id');
    }
    public function scopeParent($query){
        return $query->where('parent_id',Null);
    }
    public function scopeChild($query, $id){
        return $query->where('parent_id', $id);
    }
}
