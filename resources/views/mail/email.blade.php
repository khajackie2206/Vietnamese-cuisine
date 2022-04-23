
<div>
    <h2><font color="#FF9600">Thông tin đơn hàng</font></h2>
    <p>
        <strong class="info">Khách hàng: </strong>
        {{$info['name']}}
    </p>
    <p>
        <strong class="info">Email: </strong>
        {{$info['mail']}}
    </p>
    <p>
        <strong class="info">Điện thoại: </strong>
        {{$info['sdt']}}
    </p>
    <p>
        <strong class="info">Địa chỉ giao hàng: </strong>
        {{$info['address']}}
    </p>
</div>
<div>
    @php $sum=0; @endphp
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <td style="padding: 5px;text-align:center;"><strong>Tên món</strong></td>
            <td style="text-align:center;"><strong>Giá</strong></td>
            <td style="padding: 5px;"><strong>Số lượng</strong></td>
            <td style="text-align: center;"><strong>Thành tiền</strong></td>
        </tr>
        @foreach ($cart_info as $cart)
           @php $sum+=($cart['price']*$cart['num']); @endphp
        <tr>
            <td style="padding: 5px;">{{$cart['product_name']}}</td>
            <td style="padding: 5px;">{{number_format($cart['price'])}} VND</td>
            <td style="text-align: center;">{{$cart['num']}}</td>
            <td style="padding: 5px;">{{number_format($cart['price']*$cart['num'])}} VND</td>
        </tr>
        @endforeach
        <tr>
            <td style="font-weight: bold;">Tổng tiền:</td>
            <td colspan="3" style="font-size: 120%;font-weight:bold;text-align:center;">{{ number_format($sum) }} VNĐ</td>
        <tr>
    </table>
</div>
<div>
    <p>Đơn hàng đã được gởi đi, quý khách vui lòng kiểm tra thông tin đơn hàng trước khi thanh toán</p>
    <h4>Xin cảm ơn Quý Khách!</h4>
</div>
</font>