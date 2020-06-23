<?php namespace App\Providers\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Catalog;
class VarsComposer{
 public function compose(View $view){
     $v_catalogs = Catalog::all();
     $view->with('v_catalogs',$v_catalogs);
 }
}
