@extends('main')
@section('content')
<div class="bg0 p-t-180 p-b-85" >
    @if (count($products)!=0)
    <div class="container">
        <div class="row" style="margin-top: -60px;">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <form method="post">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                       @php $tongtien = 0; @endphp
                        <table class="table-shopping-cart">
                            <tbody><tr class="table_head">
                                <th class="column-1">SẢN PHẨM</th>
                                <th class="column-2"></th>
                                <th class="column-3">GIÁ</th>
                                <th class="column-4" style="text-align: center;">SỐ LƯỢNG</th>
                                <th class="column-5">TỔNG CỘNG</th>
                            </tr>
                            @foreach ($products as $key => $product)
                           @php
                           $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                           $pricesum = $price * $carts[$product->id];
                           $tongtien += $pricesum;
                          @endphp
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{$product->thumb}}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{$product->name}}</td>
                                <td class="column-3">{{number_format($product->price_sale != 0 ? $product->price_sale : $product->price) }}</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                       
                                      <!--  <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">                                      
                                            <i class="fs-16 zmdi zmdi-minus"></i>                                       
                                        </div>    -->
                                        <a class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" href="/down/{{$product->id}}" style="text-align: center;"> - </a>
                                        
                                                           
                                        <input class="mtext-104 cl3 txt-center num-product" type="number"  value="{{$carts[$product->id]}}"  name="num_product[{{$product->id}}]">
                                      <!--  <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>  -->
                                        <a class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" href="/up/{{$product->id}}" style="text-align: center;"> + </a>


                                    </div>
                                </td>
                                <td class="column-5" style="color: red;">{{number_format($pricesum)}}</td>
                                <td class="p-r-15">
                                    <a href="/carts/delete/{{$product->id}}" onclick="return xoa();"><img src="/template/images/trash.png" width="20px"></a>
                                </td>
                            </tr>                     
                            @endforeach
                        </tbody>
                    </table>                             
                    </div>       
                 
                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm"> 
                        <input type="submit" value="Cập nhật" formaction="/update-cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" > 
                        @csrf
                    </div>
                </div>
              </form>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <div>
                    <h4 class="mtext-109 cl2 p-b-30" style="border-bottom: 2px solid lightblue;">
                        GIỎ HÀNG 
                </div>
                    <div class="flex-w flex-t p-t-27 p-b-33" >
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Tổng cộng: 
                            </span>
                        </div>

                        <div class="size-100 p-t-1">
                            <span class="mtext-110 cl2">
                               <span style="color: red; font-weight:bold;"> {{number_format($tongtien)}} </span> VNĐ
                            </span>
                        </div>
                    </div>
                <form class="bg0 p-t-10 p-b-75" method="post">
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">                           
                            <div class="p-t-15">
                                <span class="stext-101 cl8" style="margin-left: 50px;">
                                    THÔNG TIN KHÁCH HÀNG
                                </span>
                               <div class="bg0 m-b-12" style="margin-bottom: -25px;margin-top:20px;"><span style="color:red;">*</span> Họ và tên:</div>
                                <div class="bor8 bg0 m-b-12" style="margin-top: 30px;">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Tên khách hàng" required>
                                </div>
                                <div class="bg0 m-b-12"><span style="color:red;">*</span> Email:</div>
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="mail" placeholder="Email" required >
                                </div>
                                <div class="bg0 m-b-12"><span style="color:red;">*</span> Số điện thoại:</div>
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="sdt" placeholder="Số điện thoại" required>
                                </div>
                                <div class="bg0 m-b-12"><span style="color:red;">*</span> Địa chỉ giao hàng:</div>
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Địa chỉ giao hàng" required >
                                </div>
                                <div class="bg0 m-b-12">Ghi chú:</div>
                                <div class="bor8 bg0 m-b-22">
                                    <textarea class="stext-111 cl8 plh3 size-111 p-lr-15" name="note"></textarea>
                                </div>                              
                            </div>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 nutbut bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        ĐẶT HÀNG
                    </button>
                      @csrf
                </form>
                </div>
            </div>
        </div>
    </div>
 @else 
    <div class="text-center">
     <img src="/template/images/giohang.png" style="width: 300px;height:300px;">
    </div>
    <div class="text-center" style="margin-top: 50px;"><h4>Không có sản phẩm nào trong giỏ hàng</h4></div>
@endif
</div>
<script>
  
    function xoa() {
      return confirm("Bạn có chắc muốn xác nhận xóa không?");
    }
    document.getElementById('inputSearch').style.display = "none";
    document.getElementById('icon_search').style.display = "none";
</script>   
@endsection
