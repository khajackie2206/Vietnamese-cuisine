<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Services\Product\ProductService;
class ProductControllerHome extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index($id='',$slug = '' ){
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($product->menu_id,$id);
        $comments = Comment::where('product_id',$id)->where('active','1')->get();
        return view('products.content',[
          'title' =>$product->name,
          'product' =>$product,
          'products'=> $productsMore,
          'comments' => $comments,
        ]);
    }
}
