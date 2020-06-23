<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function getIndex(Request $request){
        //dd($request->lang);
        return redirect()->back();
    }
}
