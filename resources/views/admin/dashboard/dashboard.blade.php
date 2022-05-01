@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@if(Session::get('login') == false)
<script>window.location = "{{ route('login') }}";</script>
@endif
@section('content')
<section class="content">
  <div class="container-fluid" style="margin-top:10px;">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ count($products)}}</h3>

            <p>Món ăn</p>
            
          </div>
          <div class="icon">
            <i class="nav-icon fas fas fa-coffee"></i>
          </div>
          <a href="/admin/products/list" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ count($menus)}}</h3>

            <p>Danh mục</p>
          </div>
          <div class="icon">
            <i class="nav-icon fas fa-list-alt"></i>
          </div>
          <a href="/admin/menus/list" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ count($customers)}}</h3>

            <p>Đơn hàng</p>
          </div>
          <div class="icon">
            <i class="nav-icon fas fa-cart-plus"></i>
          </div>
          <a href="/admin/customers" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ count($comments)}}</h3>

            <p>Bình luận</p>
          </div>
          <div class="icon">
            <i class="nav-icon fas fa-comment-dots"></i>
          </div>
          <a href="/admin/comments" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable ui-sortable">

        <!-- /.card -->
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Đơn hàng mới nhất</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>Khách hàng</th>
                  <th>Ngày đặt</th>
                  <th>Số sản phẩm</th>
                  <th>Tổng đơn hàng</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                      
                
                <tr>
                  <td><a href="/admin/customers/view/{{$order->id}}">{{$order->name}}</a></td>
                  <td>{{$order->created_at}}</td>
                  <td><span class="badge badge-info" style="margin-left:30px;">{{$order->sum_sp}}</span></td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20"> <span style="color:red;font-weight:bold;">{{ number_format($order->sum_price)}}</span> VNĐ</div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <a href="/admin/customers" class="btn btn-sm btn-info float-left">Xem tất cả đơn hàng</a>
          </div>
          <!-- /.card-footer -->
        </div>

        <!-- /.card -->
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable ui-sortable">
        <!-- /.card -->

        <!-- Calendar -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Món ăn được yêu thích nhất</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
              @foreach ($ratings as $rating)
              <li class="item">
                <div class="product-img">
                  <img src="{{$rating->thumb}}" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                  <a href="#" class="product-title" style="margin-left: 50px;">{{$rating->name}}
                    </a>
                    <span class="badge badge-warning float-right" style="margin-right: 20px;">
                      {{round($rating->tb,1)}}
                      <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star"></i>
                    </span>
                     </span>
                  <span class="product-description" style="margin-left:50px;">
                    <span style="color: red;font-weight:bold;"> {{number_format($rating->price)}} </span> VNĐ
                  </span>
                </div>
              </li>
              @endforeach
              <!-- /.item -->
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="/admin/comments" class="uppercase">Xem tất cả</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
  @endsection