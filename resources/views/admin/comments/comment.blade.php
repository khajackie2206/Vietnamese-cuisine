
@extends('admin.main')
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
    <table class="table">
      <thead> 
          <tr>
              <th>Món ăn</th>
              <th>Người bình luận</th>
              <th>Email</th>
              <th>Nội dung</th>
              <th>Rating</th>
              <th>Duyệt</th>
              <th style="padding-left:50px;">Thời gian</th>
              <th style="width:100px;">&nbsp;Thao tác</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($comments as $key =>$comment)
        <tr>
            <td>{{$comment->pro_name}}</td>
            <td>{{$comment->name}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->review}}</td>
            <td style="padding-left: 30px;">{{$comment->rating}}</td>
            <td>
            @if ($comment->active==0)<span class="btn btn-danger btn-xs">NO</span>          
            @else <span class="btn btn-success btn-xs">YES</span> 
            @endif</td>
            <td>{{$comment->updated_at}}</td>
            <td>
             <a class="btn btn-primary btn-sm" onclick="return check()" href="/admin/comments/check/{{$comment->id}}">    
                <i class="fas fa-check"></i>     
             </a>
             &nbsp;
             <a class="btn btn-danger btn-sm" onclick="return xoacmmt()" href="/admin/comments/destroy/{{$comment->id}}" >    
                <i class="fas fa-trash"></i>     
             </a>
           </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div class="card-footer clearfix">
    </div>
    <script>
        function check(){
            return confirm("Đồng ý duyệt bình luận này?");
        }
        function xoacmmt(){
            return confirm("Đồng ý xóa bình luận này?");
        }
    </script>
@endsection