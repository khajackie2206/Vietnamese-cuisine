@extends('admin.main')
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
    <table class="table">
      <thead> 
          <tr>
              <th style="width: 200px;padding-left:50px;">Tên khách hàng</th>
              <th style="padding-left:90px;">Số điện thoại</th>
              <th>Email</th>
              <th>Ngày đặt hàng</th>
              <th>Hành động</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($customers as $key =>$customer)
        <tr>
            <td style="width: 200px;padding-left:50px;">{{$customer->name}}</td>
            <td style="padding-left:90px;">{{$customer->sdt}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->created_at}}</td>
            <td>
             <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{$customer->id}}">    
                <i class="fas fa-edit"></i>     
             </a>
             &nbsp;
             <a class="btn btn-danger btn-sm" onclick="return ConfirmDelete()" href="/admin/customers/destroy/{{$customer->id}}" >    
                <i class="fas fa-trash"></i>     
             </a>
           </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div class="card-footer clearfix">
    {!!$customers->links()!!}
    </div>
    <script>
        function ConfirmDelete()
{
 return confirm("Bạn có muốn xóa đơn hàng này không?");
}
    </script>
@endsection
