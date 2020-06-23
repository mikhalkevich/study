<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Product;

class ProductController extends Controller
{
    public function getCatalog($id=null){
        $catalog = Catalog::find($id);
        $objs = Product::where('catalog_id', $id)->paginate(30);
        return view('products', compact('catalog', 'objs'));
    }
    public function getOne($id = null){
        $obj = Product::find($id);
        return view('product', compact('obj'));
    }
    public function getAll(){
        $all = Product::where('id','>', 0)->paginate(30);
        return view('welcome', compact('all'));
    }
}
