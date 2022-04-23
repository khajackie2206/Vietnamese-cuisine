<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
class CartController extends Controller
{
    //
    protected $cartService;

    public function __construct(CartService $cartService){
      $this->cartService = $cartService;
    }
    public function index(Request $request){
       $result =  $this->cartService->create($request);
         if($result==false){
           return redirect()->back();
         }
         return redirect('/carts');
    }
    public function show(){
      $products = $this->cartService->getProduct();
      return view('carts.listcart',[
      'title'=>'Giỏ hàng',
      'products'=> $products,
      'carts'=> session()->get('carts')
      ]);
    }
    public function update(Request $request){
      $this->cartService->update($request);
      return redirect('/carts');
    }
 
    public function down(Request $request){
       $carts = session()->get('carts');
       $productid = (int)$request->id;
       $carts[$productid] = $carts[$productid] - 1;
       if($carts[$productid]<=0) $carts[$productid]=1;
       session()->put('carts', $carts);
       return redirect('/carts');
    }
    public function up(Request $request){
      $carts = session()->get('carts');
      $productid = (int)$request->id;
      $carts[$productid] = $carts[$productid] + 1;
      session()->put('carts', $carts);
      return redirect('/carts');
   }
   public function delete($id=0){
    $carts = session()->get('carts');
    unset($carts[$id]);
    session()->put('carts',$carts);
    return redirect('/carts');
   }
   public function addcart(Request $request){
     $result = $this->cartService->addcart($request);
      return redirect()->back()->with('alert','Đặt hàng thành công!');
    }
    
}
