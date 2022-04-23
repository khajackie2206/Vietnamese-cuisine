<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use Illuminate\Support\Facades\DB;
use App\Models\Customers;
use App\Models\Product;
use App\Models\Cart;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class CartService
{
    public function create($request)
    {
        $solg = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($solg <= 0 || $product_id <= 0) {
            $request->session()->alert('Số lượng hoặc sản phẩm không chính xác');
            return false;
        }
        $carts = session()->get('carts');
        if (is_null($carts)) {
            session()->put('carts', [
                $product_id => $solg
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $solg;
            session()->put('carts', $carts);
            return true;
        }
        $carts[$product_id] = $solg;
        session()->put('carts', $carts);
    }
    public function getProduct()
    {
        $carts = session()->get('carts');
        if (is_null($carts)) {
            return [];
        }
        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }
    public function update($request)
    {
        session()->put('carts', $request->input('num_product'));
        return true;
    }
    public function addcart($request)
    {
        try {
            DB::beginTransaction();
            $carts = session()->get('carts');
            if (is_null($carts)) {
                return false;
            }
            $customer = Customers::create([
                'name' => $request->input('name'),
                'sdt'  => $request->input('sdt'),
                'address' => $request->input('address'),
                'email' => $request->input('mail'),
                'note' => $request->input('note'),
            ]);
            $this->infoCart($carts, $customer->id);
            DB::commit();

            #Queue
            $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                ->where('active', 1)
                ->whereIn('id', $productId)
                ->get();
            //    SendMail::dispatch($request->input('mail'),$request->input('name'),$request->input('sdt'),$products)->delay(now()->addSeconds(3));
            $data['info'] = $request->all();
            $email = $request->input('mail');
            $data['cart_info'] = $this->addInfo($carts, $customer->id);
            //end
            Mail::send('mail.email', $data, function ($message) use ($email) {
                $message->from('khajackie2206@gmail.com', 'Món ngon Việt Nam');
                $message->to($email, $email);
                $message->cc('khajackie2206@gmail.com', 'Món ngon Việt Nam');
                $message->subject('Món ngon Việt Nam - Xác nhận đơn hàng');
            });
        session()->forget('carts');
        } catch (Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return true;
    }
    public function addInfo($carts, $customer_id){
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
        ->where('active', 1)
        ->whereIn('id', $productId)
        ->get();
        $data_cart = [];
        foreach ($products as $product) {
            $data_cart[] = [
                'product_name' => $product->name,
                'num' => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }
        return $data_cart;
    }
    protected function infoCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'num' => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }
        return Cart::insert($data);
    }
    public function getCustomer()
    {
        return Customers::orderByDesc('id')->paginate(15);
    }
    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'thumb');
        }])->get();
    }
    public function delete($request){
        $customer = Customers::where('id',$request->input('id'))->first();
        if($customer){
            $customer->delete();
            return true;
        }
        return false;
    }
}
