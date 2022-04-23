@extends('main')
@section('content')
<div class="bg0 m-t-23 p-b-140 p-t-150">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
              <h1>{{$title}}</h1>
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                     Lọc
                </div>
            </div>
            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sắp xếp
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{ request()->url()}}" class="filter-link stext-106 trans-04">
                                    Mặc định
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="?price=asc" class="filter-link stext-106 trans-04">
                                    Giá: Từ thấp đến cao
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="?price=desc" class="filter-link stext-106 trans-04">
                                    Giá: Cao đến thấp
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Giá
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{request()->url()}}" class="filter-link stext-106 trans-04">
                                    Tất cả
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="?price=1" class="filter-link stext-106 trans-04">
                                    Dưới 200.000 VNĐ
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="?price=2" class="filter-link stext-106 trans-04">
                                    200.000 - 500.000 VNĐ
                                </a>
                            </li>
                            <li class="p-b-6">
                                <a href="?price=3" class="filter-link stext-106 trans-04">
                                    Trên 500.000 VNĐ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="product_menu">
          @include('products.list')
          {!! $products->links() !!}
        </div>
    </div>
   
</div>

<script>
     document.getElementById('inputSearch').style.display = "none";
    document.getElementById('icon_search').style.display = "none";
</script>
@endsection
