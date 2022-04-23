<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductAdminService;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.list',[
           'title' => 'Danh sách sản phẩm',
           'products'=>$this->productService->get()
        ]);
       
    }
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function create(){
        return view('admin.products.add',[
            'title' => 'Thêm sản phẩm mới',
            'menus' => $this->productService->getMenu()
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $this->productService->insert($request);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('admin.products.edit',[
            'title'=>'Chỉnh sửa sản phẩm',
            'product'=>$product,
            'menus' => $this->productService->getMenu()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
       $result = $this->productService->update($request,$product);
       if($result){
        return redirect('/admin/products/list');
       }
       return redirect()->back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $result=$this->productService->delete($request);
        if($result){
            return response()->json([
                'error' =>false,
                'message'=> 'Xóa thành công sản phẩm'
            ]);
        }
        return response()->json([
            'error' =>true
        ]);   
    }
}
