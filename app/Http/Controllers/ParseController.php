<?php

namespace App\Http\Controllers;

use App\CatalogOnliner;
use App\Parse\Onliner;
use App\Parse\Amd;
use App\Parse\Oz;


class ParseController extends Controller
{
    public function getIndex()
    {
        return view('parse');
    }

    public function postProduct()
    {
        $obj = CatalogOnliner::where('status', 'parse')->first();
        $parse = new Onliner;
        echo $parse->getParse($obj);
    }

    public function getProduct()
    {
        $obj = CatalogOnliner::where('status', 'parse')->first();
        $parse = new Onliner;
        echo $parse->getParse($obj);
    }

    public function getCatalog()
    {
        $parse = new Onliner;
        $str = $parse->catalog();
        dd($str);
    }

    public function getAllAmd()
    {
        $obj = new Amd;
        $body = $obj->getAll();
        dd($body);
    }

    public function getProductAmd()
    {
        $objs = CatalogOnliner::where('status', 'parse')->get();
        $arr = [];
        foreach ($objs as $one) {
            $parse = new Amd;
            $arr[] = $parse->getParse($one);
            sleep(1);
        }
        dd($arr);
    }

    public function getCatalogOz()
    {
        $obj = new Oz;
        dd($obj->catalog());
    }
    public function getParse(){
        $obj = CatalogOnliner::where('status', 'parse')->first();
        $oz = new Oz;
        dd($oz->getParse($obj));
    }
}
