<?php

namespace App\Http\Controllers;
use App\Catalog;
use App\Product;
class BestController extends Controller
{
    public function getAll(){
        //$catalogs = Catalog::where('parent_id', Null)->get();
        $catalogs = Catalog::parent()->orderBy('id','DESC')->get();
       // $child = Catalog::child(5)->get();

        //$vip = Product::find(5);
        $vip = Product::where('status','vip')->first();
        // ::findOrFail(1)
        // ->firstOrFail(1)
        //  $obj = Product::where()->firstOr(function(){
        //  });
        //Catalog::create(['name'=>'Классика']);
        //$obj = new Catalog;
        //$obj->name = 'Детективы';
        //$obj->save();
        //Catalog::where('name','Детективы')->firstOrCreate(['name', 'Детективы']);
        //$obj = Catalog::where('name','Фантастика')->first();
        //$obj->parent_id = 5;
        //$obj->save();
        //->updateOrCreate([]);
        //$obj = Catalog::find(1);
        //$obj->delete();
        //$arr = [1,2,3];
         //Catalog::destroy(collect(1,2,3));
        return view('best', compact('catalogs', 'vip'));
    }
}
