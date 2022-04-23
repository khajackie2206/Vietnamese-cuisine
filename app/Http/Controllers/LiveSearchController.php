<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Services\Menu\MenuService;
class LiveSearchController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function Search(Request $request){
        $output = '';
        $products = Product::where('name','LIKE','%'.$request->search.'%')->limit(3)->get();
        if(count($products)>0){
        foreach ($products as $product){
            $output .= '<a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="list-group-item list-group-item-action border-1" style="width: 300px;">
            <table style="border-bottom:none;">
               <tr>
                  <td rowspan="2" style="width: 120px; height: 60px;"><img src="'.$product->thumb.'" style="width: 100px; height: 58px;"></td>
                  <td style="font-weight:bold;width: 220px; height: 35px;">'.$product->name.'</td>
               </tr>
               <tr>
                  <td style="color:red;width: 200px; height: 35px;">'.number_format($product->price_sale).' đ</td>
               </tr>
            </table>
            </a>';
        }
    } else $output='<a  class="list-group-item list-group-item-action border-1" style="width: 300px;text-align:center;">Không tìm thấy kết quả</a>';
   
        return response()->json($output);
    }
    public function search_pro(Request $request){
        $output = '';
        $products = Product::where('name','LIKE','%'.$request->search_pro.'%')->limit(8)->get();
        if(count($products)>0){
        $output .='<div class="row isotope-grid">';
        foreach ($products as $product){
            $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                <div class="block2-pic hov-img0">
                <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                    <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                </a>
                </div>
                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                        &nbsp;&nbsp; '.$product->name.'
                        </a> ';
                 if($product->price_sale!=0){
                 $output .= '<span class="stext-105 cl3">
                 &nbsp;&nbsp;
                <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                </span> 
                  <span class="stext-105 cl3">
                  &nbsp;&nbsp;
                <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                 </span> ';} else {
                   $output .= '
                   <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                      <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                   </span>
                   <span class="stext-105 cl3">
                      <span> &nbsp;</span>
                    </span>
                   ';
                 }
                    $output .= '
                    </div>
                </div>
            </div>
        </div>';
        }
        $output .='</div>';         
    } else $output ='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
}
    public function locAll(Request $request){
        $output = '';
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')->orderByDesc('id')->get();
        if(count($products)>0){
            $output .='<div class="row isotope-grid">';
            foreach ($products as $product){
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                    <div class="block2-pic hov-img0">
                        <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                            &nbsp;&nbsp; '.$product->name.'
                            </a> ';
                     if($product->price_sale!=0){
                     $output .= '<span class="stext-105 cl3">
                     &nbsp;&nbsp;
                    <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                    </span> 
                      <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                    <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                     </span> ';} else {
                       $output .= '
                       <span class="stext-105 cl3">
                          &nbsp;&nbsp;
                          <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                       </span>
                       <span class="stext-105 cl3">
                          <span> &nbsp;</span>
                        </span>
                       ';
                     }
                        $output .= '
                        </div>
                    </div>
                </div>
            </div>';
            }
            $output .='</div>';         
        } else $output='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
    }
  
   
    public function cost200(Request $request){
        $output = '';
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')->where('price_sale','<',200000)->get();
        if(count($products)>0){
            $output .='<div class="row isotope-grid">';
            foreach ($products as $product){
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                    <div class="block2-pic hov-img0">
                        <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                            &nbsp;&nbsp; '.$product->name.'
                            </a> ';
                     if($product->price_sale!=0){
                     $output .= '<span class="stext-105 cl3">
                     &nbsp;&nbsp;
                    <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                    </span> 
                      <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                    <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                     </span> ';} else {
                       $output .= '
                       <span class="stext-105 cl3">
                          &nbsp;&nbsp;
                          <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                       </span>
                       <span class="stext-105 cl3">
                          <span> &nbsp;</span>
                        </span>
                       ';
                     }
                        $output .= '
                        </div>
                    </div>
                </div>
            </div>';
            }
            $output .='</div>';         
        } else $output='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
    }
    public function cost250(Request $request){
        $output = '';
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')->whereBetween('price_sale',[200000, 500000])->get();
        if(count($products)>0){
            $output .='<div class="row isotope-grid">';
            foreach ($products as $product){
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                    <div class="block2-pic hov-img0">
                        <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                            &nbsp;&nbsp; '.$product->name.'
                            </a> ';
                     if($product->price_sale!=0){
                     $output .= '<span class="stext-105 cl3">
                     &nbsp;&nbsp;
                    <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                    </span> 
                      <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                    <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                     </span> ';} else {
                       $output .= '
                       <span class="stext-105 cl3">
                          &nbsp;&nbsp;
                          <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                       </span>
                       <span class="stext-105 cl3">
                          <span> &nbsp;</span>
                        </span>
                       ';
                     }
                        $output .= '
                        </div>
                    </div>
                </div>
            </div>';
            }
            $output .='</div>';         
        } else $output='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
    }
    public function cost500(Request $request){
        $output = '';
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')->where('price_sale','>=',500000)->get();
        if(count($products)>0){
            $output .='<div class="row isotope-grid">';
            foreach ($products as $product){
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                    <div class="block2-pic hov-img0">
                        <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                            &nbsp;&nbsp; '.$product->name.'
                            </a> ';
                     if($product->price_sale!=0){
                     $output .= '<span class="stext-105 cl3">
                     &nbsp;&nbsp;
                    <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                    </span> 
                      <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                    <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                     </span> ';} else {
                       $output .= '
                       <span class="stext-105 cl3">
                          &nbsp;&nbsp;
                          <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                       </span>
                       <span class="stext-105 cl3">
                          <span> &nbsp;</span>
                        </span>
                       ';
                     }
                        $output .= '
                        </div>
                    </div>
                </div>
            </div>';
            }
            $output .='</div>';         
        } else $output='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
    }
    public function asc(Request $request){
        $output = '';
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')->orderBy('price','asc')->get();
        if(count($products)>0){
            $output .='<div class="row isotope-grid">';
            foreach ($products as $product){
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                    <div class="block2-pic hov-img0">
                        <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                            &nbsp;&nbsp; '.$product->name.'
                            </a> ';
                     if($product->price_sale!=0){
                     $output .= '<span class="stext-105 cl3">
                     &nbsp;&nbsp;
                    <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                    </span> 
                      <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                    <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                     </span> ';} else {
                       $output .= '
                       <span class="stext-105 cl3">
                          &nbsp;&nbsp;
                          <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                       </span>
                       <span class="stext-105 cl3">
                          <span> &nbsp;</span>
                        </span>
                       ';
                     }
                        $output .= '
                        </div>
                    </div>
                </div>
            </div>';
            }
            $output .='</div>';         
        } else $output='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
    }
    public function desc(Request $request){
        $output = '';
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')->orderBy('price','desc')->get();
        if(count($products)>0){
            $output .='<div class="row isotope-grid">';
            foreach ($products as $product){
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                    <div class="block2-pic hov-img0">
                        <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                            &nbsp;&nbsp; '.$product->name.'
                            </a> ';
                     if($product->price_sale!=0){
                     $output .= '<span class="stext-105 cl3">
                     &nbsp;&nbsp;
                    <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                    </span> 
                      <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                    <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                     </span> ';} else {
                       $output .= '
                       <span class="stext-105 cl3">
                          &nbsp;&nbsp;
                          <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                       </span>
                       <span class="stext-105 cl3">
                          <span> &nbsp;</span>
                        </span>
                       ';
                     }
                        $output .= '
                        </div>
                    </div>
                </div>
            </div>';
            }
            $output .='</div>';         
        } else $output='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
    }
    public function test(Request $request){
        $output = '';
        $search=$request->get('query');
        $menu = $this->menuService->getID_menu($search);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')->where('menu_id',$menu->id)->orderBy('price','desc')->get();
       if(count($products)>0){
            $output .='<div class="row isotope-grid">';
            foreach ($products as $product){
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2" style="height: auto;border-radius: 4px;margin-top: 12px;border: 2px solid transparent;cursor: pointer;box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);">
                    <div class="block2-pic hov-img0">
                        <img src="'.$product->thumb.'" alt="'.$product->name.'" style="height: 200px;">
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/'.$product->id.'-'.$product->name.'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size: 16px;text-transform: uppercase;">
                            &nbsp;&nbsp; '.$product->name.'
                            </a> ';
                     if($product->price_sale!=0){
                     $output .= '<span class="stext-105 cl3">
                     &nbsp;&nbsp;
                    <span style="color: lightgrey;text-decoration:line-through;">'.number_format($product->price).'VNĐ</span> 
                    </span> 
                      <span class="stext-105 cl3">
                      &nbsp;&nbsp;
                    <span style="color: red;">'.number_format($product->price_sale).'</span> VNĐ
                     </span> ';} else {
                       $output .= '
                       <span class="stext-105 cl3">
                          &nbsp;&nbsp;
                          <span style="color: red;">'.number_format($product->price).'</span> VNĐ
                       </span>
                       <span class="stext-105 cl3">
                          <span> &nbsp;</span>
                        </span>
                       ';
                     }
                        $output .= '
                        </div>
                    </div>
                </div>
            </div>';
            }
            $output .='</div>';         
        } else $output='<div class="row justify-content-center"><h2>Không tìm thấy món ăn</h2></div>';
        return response()->json($output);
    }
}
