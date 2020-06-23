<?php

namespace App\Http\Controllers;
use App\Http\Requests\OrderRequest;
use App\Order;
use Auth;
class OrderController extends Controller
{
    public function postAll(OrderRequest $r){
        unset($r['_token']);
        $r['user_id'] = (Auth::guest())?'':Auth::user()->id;
        $r['body'] = $_COOKIE['basket'];
        $r['status'] = 'default';
        Order::create($r->all());
        setcookie('basket','',time()-1, '/');
        return redirect()->back();
    }
}
