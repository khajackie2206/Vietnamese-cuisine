<?php

namespace App\Http\Services\Product;
use Illuminate\Support\Facades\Log;
use App\Models\Menu;
use App\Models\Product;
use Exception;

class ProductAdminService {
    public function getMenu(){
        return Menu::where('active',1)->get();
    }
    protected function isValidPrice($request){
        if ($request->input('price') !=0 && $request->input('price_sale')!=0 && 
        $request->input('price_sale') >= $request->input('price')){
            $request->session()->flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if($request->input('price_sale')!=0 && (int)$request->input('price')==0){
            $request->session()->flash('error','Vui lòng nhập giá gốc');
         return false;
        }
        return true;
    }
    public function insert($request){
           $isValidPrice = $this->isValidPrice($request);
           if($isValidPrice==false){
               return false;
           }
           try{
               $request->except('_token');
            Product::create($request->all());
         $request->session()->flash('success','Thêm sản phẩm thành công');
           } catch (Exception $err){
            $request->session()->flash('error','Thêm sản phẩm thất bại do lỗi');
            Log::info($err->getMessage());
            return false;
           }
           return true;
    }
    public function get(){
        return Product::with('menu')
        ->orderByDesc('id')->paginate(15);
    }
    public function update($request,$product){
       $isValidPrice = $this->isValidPrice($request);
       if($isValidPrice==false) return false;
       try{
        $product->fill($request->input());
        $product->save();
        $request->session()->flash('success','Cập nhật thành công');
       } catch (Exception $err){
        $request->session()->flash('error','Có lỗi xảy ra, vui lòng thử lại');
        Log::info($err->getMessage());
        return false;
       }
       return true;
      }
      public function delete($request){
          $product = Product::where('id',$request->input('id'))->first();
          if($product){
              $product->delete();
              return true;
          }
          return false;
      }
    }
