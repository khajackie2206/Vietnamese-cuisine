@extends('admin.main')
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
    <table class="table">
      <thead> 
          <tr>
              <th style="padding-left:30px;">Tên sản phẩm</th>
              <th>Hình sản phẩm</th>
              <th>Danh mục</th>
              <th>Giá gốc</th>
              <th>Giá khuyến mãi</th>
              <th>Kích hoạt</th>
              <th style="padding-left:50px;">Cập nhật</th>
              <th style="width:100px;">&nbsp;Thao tác</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($products as $key =>$product)
        <tr>
            <td style="padding-left: 30px;">{{$product->name}}</td>
            <td><img src="{{$product->thumb}}" style="width: 100px; height:90px;"></td>
            <td>{{$product->menu->name}}</td>
            <td>{{number_format($product->price)}}</td>
            <td style="padding-left: 40px;">{{number_format($product->price_sale)}}</td>
            <td style="padding-left: 30px;">{!! \App\Helpers\Helper::active($product->active) !!}</td>
            <td>{{$product->updated_at}}</td>
            <td>
             <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">    
                <i class="fas fa-edit"></i>     
             </a>
             &nbsp;
             <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$product->id}},'/admin/products/destroy')">    
                <i class="fas fa-trash"></i>     
             </a>
           </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div class="card-footer clearfix">
    {!!$products->links()!!}
    </div>
@endsection