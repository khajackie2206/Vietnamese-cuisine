<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
class MainControllerAdmin extends Controller
{
    protected $slider;
    protected $menu;
    public function __construct(SliderService $slider){
       $this->slider = $slider;
    }
    public function index(){
        return view('admin.users.login',[
         'title' => 'Trang Đăng Nhập Admin',
        ]);
    }
}
