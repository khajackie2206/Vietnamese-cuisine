<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Comment;
use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashBoardController extends Controller
{
    //
    public function index(){
        $comments = Comment::get();
        $products = Product::get();
        $customers = Customers::get();
        $menus = Menu :: get();
     //   $ratings = Comment::join('products', 'comments.product_id', '=', 'products.id')
      //  ->select('products.thumb' , 'products.name as pro_name',\DB::raw("avg(COLUMN_NAME)"))->orderBy('pro_name')->get();
      $ratings = DB::table('comments')
      ->join('products', 'products.id', '=', 'comments.product_id')
      ->select( DB::raw('AVG(comments.rating) AS tb'),'products.name','products.thumb','products.price')
      ->groupBy('products.name','products.thumb','products.price')   
      ->orderByDesc('tb')
      ->limit(5)          
      ->get();
      $orders = DB::table('carts')->join('customers', 'customers.id', '=', 'carts.customer_id')
      ->select('customers.id','customers.name','customers.created_at',DB::raw('count(carts.product_id) AS sum_sp'),DB::raw('sum(carts.num * carts.price) AS sum_price'))
      ->groupBy('customers.id','customers.name','customers.created_at')
      ->orderByDesc('customers.created_at')
      ->limit(8)
      ->get();


        return view('admin.dashboard.dashboard',[
            'title' => 'Bảng điều khiển',
            'comments' => $comments,
            'products' =>$products,
            'customers' =>$customers,
            'menus' => $menus,
            'ratings' => $ratings,
            'orders' => $orders
        ]);
    }
}
