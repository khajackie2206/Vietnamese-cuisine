<?php

//use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainControllerAdmin;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\MenuControllerHome;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ProductControllerHome;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CartListController;
use App\Http\Controllers\LiveSearchController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('admin/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::get('/',[MainControllerAdmin::class,'index'])->name('admin');
        Route::get('main',[MainControllerAdmin::class,'index']);
    
        #Menu
        Route::prefix('menus')->group(function(){
            Route::get('add',[MenuController::class,'create'])->name('add');
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::DELETE('destroy',[MenuController::class,'destroy']);

        });
        #Product
        Route::prefix('products')->group(function(){
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::DELETE('destroy',[ProductController::class,'destroy']);

        });
        #Slider
        Route::prefix('sliders')->group(function(){
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::DELETE('destroy',[SliderController::class,'destroy']);

        });
        #Upload
        Route::post('upload/services',[UploadController::class,'store']);

        #CartList
        Route::get('customers',[CartListController::class,'index']);
        Route::get('customers/view/{customer}',[CartListController::class,'detail']);
        Route::get('customers/destroy/{customer}',[CartListController::class,'destroy']);
        #Comments
        Route::get('comments',[CommentController::class,'index']);
        Route::get('comments/check/{comment}',[CommentController::class,'duyet']);
        Route::get('comments/destroy/{comment}',[CommentController::class,'destroy']);
    });

  
   
});
Route::get('/',[MainController::class,'index']);
Route::post('/services/load-product',[MainController::class,'loadProduct']);
Route::get('danh-muc/{id}-{slug}.html',[MenuControllerHome::class,'dsmenu']);
#Load san pham 
Route::get('san-pham/{id}-{slug}.html',[ProductControllerHome::class,'index']);
# Gio hang
Route::post('add-cart',[CartController::class,'index']);
Route::get('carts',[CartController::class,'show']);
Route::post('update-cart',[CartController::class,'update']);
Route::get('down/{id}',[CartController::class,'down']);
Route::get('up/{id}',[CartController::class,'up']);
Route::get('carts/delete/{id}', [CartController::class,'delete']);
Route::post('carts',[CartController::class,'addcart']);
# livesearch
Route::get('search',[LiveSearchController::class,'search']);
Route::get('search_pro',[LiveSearchController::class,'search_pro']);
Route::post('locall',[LiveSearchController::class,'locAll']);
Route::post('giaikhat',[LiveSearchController::class,'giaiKhat']);
Route::post('khaivi',[LiveSearchController::class,'khaiVi']);
Route::post('trangmieng',[LiveSearchController::class,'trangMieng']);
Route::post('monchinh',[LiveSearchController::class,'monChinh']);
Route::post('cost200',[LiveSearchController::class,'cost200']);
Route::post('cost250',[LiveSearchController::class,'cost250']);
Route::post('cost500',[LiveSearchController::class,'cost500']);
Route::post('asc',[LiveSearchController::class,'asc']);
Route::post('desc',[LiveSearchController::class,'desc']);
Route::post('test',[LiveSearchController::class,'test']);
#comment
Route::post('add_comment',[CommentController::class,'addComment']);
