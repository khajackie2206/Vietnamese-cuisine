@extends('admin.main')
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
    <table class="table">
      <thead> 
          <tr>
              <th style="padding-left:20px;">Tên sản phẩm</th>
              <th>Hình sản phẩm</th>
              <th>Danh mục</th>
              <th>Giá gốc</th>
              <th>Giá sale</th>
              <th>Kích hoạt</th>
              <th style="width:100px;">&nbsp;Thao tác</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($products as $key =>$product)
        <tr>
            <td style="padding-left: 20px;">{{$product->name}}</td>
            <td><img src="{{$product->thumb}}" style="width: 100px; height:90px;"></td>
            <td>{{$product->menu->name}}</td>
            <td>{{number_format($product->price)}}</td>
            <td >{{number_format($product->price_sale)}}</td>
            <td >{!! \App\Helpers\Helper::active($product->active) !!}</td>
            <td>
             <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">    
                <i class="fas fa-edit"></i>     
             </a>
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