<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Auth;
use App\Product;
use App\Catalog;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $catalogs = Catalog::all();
        $user = $request->user;
        $products = Product::where('user_id', Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        setcookie('user', Auth::user()->name, time()+3600, '/');
        return view('home', compact('catalogs', 'products', 'user'));
    }

    public function postIndex(ProductRequest $r)
    {
        $pic = \App::make('\App\Libs\Imag')->url($_FILES['picture1']['tmp_name']);
        if($pic){
            $r['picture'] = $pic;
        }else{
            $r['picture'] = '';
        }
        $r['user_id'] = Auth::user()->id;
        $r['status'] = '';
        Product::create($r->all());
        return redirect()->back();
    }
    public function getDelete($id = null){
        $obj = Product::find($id);
        $obj->delete();
        return redirect()->back();
    }
}
