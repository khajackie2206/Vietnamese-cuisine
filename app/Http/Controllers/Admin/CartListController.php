<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
class CartListController extends Controller
{
    //
    protected $cart;
    public function __construct(CartService $cart)
    {
      $this->cart=$cart;        
    }
    public function index(){
       return view('admin.carts.customer',[ 
           'title' => 'Danh sách đơn hàng',
           'customers'=>$this->cart->getCustomer()
       ]);
    }
    public function detail(Customers $customer){
      $carts = $this->cart->getProductForCart($customer);
         return view('admin.carts.detail',[
            'title' => 'Chi tiết đơn hàng của khách hàng: '.$customer->name,
            'customer'=>$customer,
            'carts'=> $carts,
         ]);
    }
    public function destroy(Customers $customer)
    {
   
        $customer = Customers::where('id',$customer->id)->first();
        if($customer){
            $customer->delete();
        }
        return redirect()->back();
    }
}
