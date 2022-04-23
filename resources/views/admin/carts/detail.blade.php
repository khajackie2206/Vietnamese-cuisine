@extends('admin.main')
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
  <div class="customer">
      <ul>
          <li>Tên khách hàng: <strong>{{$customer->name}}</strong></li>
          <li>Số điện thoại: <strong>{{$customer->sđt }}</strong></li>
          <li>Địa chỉ giao hàng: <strong>{{$customer->address}}</strong></li>
          <li>Email: <strong>{{$customer->email}}</strong></li>
          <li>Ghi chú: <strong>{{$customer->note}}</strong></li>

      </ul>
  </div>
  <div class="carts">
    @php $tongtien = 0; @endphp
    <table class="table">
        <tbody><tr class="table_head">
            <th class="column-1" style="padding-left:100px;">Sản phẩm</th>
            <th class="column-2">Tên sản phẩm</th>
            <th class="column-3">Giá</th>
            <th class="column-4">SỐ LƯỢNG</th>
            <th class="column-5">TỔNG CỘNG</th>
        </tr>

        
       @foreach ($carts as $key => $cart)
            @php
     
            $price = $cart->price * $cart->num;
            $tongtien += $price;
           @endphp
        <tr>
            <td class="column-1" style="padding-left:90px;">
                <div class="how-itemcart1">
                    <img src="{{$cart->product->thumb}}" alt="IMG" style="width: 100px;">
                </div>
            </td>
            <td class="column-2">{{$cart->product->name}}</td>
            <td class="column-3">{{number_format($cart->price) }}</td>
            <td class="column-4" style="padding-left:50px;">{{$cart->num}}</td>
            <td class="column-5" style="padding-left:30px;">{{number_format($cart->price*$cart->num)}}</td>
        </tr>                     
        @endforeach
        <tr>
            <td colspan="4" style="font-size: 130%;font-weight:bold;">Tổng tiền</td>
            <td style="font-size: 120%;"><span style="color:red;">{{number_format($tongtien)}}</span> VNĐ</td>
        </tr>
    </tbody>
</table>         
  </div>
@endsection