<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
class MenuControllerHome extends Controller
{
    //
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function dsmenu(Request $request, $id, $slug=''){
       $menu = $this->menuService->getID($id);
       $products = $this->menuService->getProduct($menu, $request);
       return view('menu',[
       'title' =>$menu->name,
       'products' =>$products,
       'menu' =>$menu,
       ]);
     
    }
}
