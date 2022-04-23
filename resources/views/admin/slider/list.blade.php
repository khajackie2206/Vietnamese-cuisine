@extends('admin.main')
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
    <table class="table">
      <thead> 
          <tr>
              <th style="padding-left: 50px;">Tiêu đề</th>
              <th style="width: 150px;">Link</th>
              <th style="padding-left: 40px;">Hình ảnh</th>
              <th>Kích hoạt</th>
              <th>Cập nhật</th>
              <th style="width:100px;">&nbsp;Thao tác</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($sliders as $key =>$slider)
        <tr>
            <td style="padding-left: 50px;">{{$slider->name}}</td>
            <td style="width: 150px;">{{$slider->url}}</td>
            <td><img src="{{$slider->thumb}}" style="width: 130px;"></td>
            <td style="padding-left:30px;">{!! \App\Helpers\Helper::active($slider->active) !!}</td>
            <td>{{$slider->updated_at}}</td>
            <td>
             <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}">    
                <i class="fas fa-edit"></i>     
             </a>
             <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$slider->id}},'/admin/sliders/destroy')">    
                <i class="fas fa-trash"></i>     
             </a>
           </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    {!!$sliders->links()!!}
@endsection