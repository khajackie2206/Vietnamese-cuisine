<?php
namespace App\Http\View\Composers;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Models\Product;
class CartComposer{
   
    protected $users;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        
    }
 
  
    public function compose(View $view)
    {
        $carts = session()->get('carts');
        if(is_null($carts)){
            return [];
        }
        $productId = array_keys($carts);
        $products = Product::select('id','name','price','price_sale','thumb')
        ->where('active',1)
        ->whereIn('id',$productId)
        ->get();
        $view->with('products', $products)->with('carts',$carts);
    }
}