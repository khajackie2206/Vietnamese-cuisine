@extends('admin.main')
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
    <table class="table">
      <thead> 
          <tr>
              <th style="width:200px;padding-left:30px;">ID Danh mục</th>
              <th>Tên danh mục</th>
              <th>Kích hoạt</th>
              <th>Cập nhật</th>
              <th style="width:170px;">&nbsp;Hàng động</th>
          </tr>
      </thead>
      <tbody>
          {!! \App\Helpers\Helper::menu($menus)!!}
      </tbody>
    </table>
@endsection