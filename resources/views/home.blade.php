@extends('main')
@section('content')
<!-- Slider -->
<section class="section-slide p-t-80 loader">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach ($sliders as $slider)
            <div class="item-slick1" style="background-image: url({{$slider->thumb}}); max-height:500px;">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2" style="color: white;">
                                YÊU THÍCH NHẤT
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color: white;">
                                {{$slider->name}}
                            </h2>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="{{$slider->url}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                ĐẶT NGAY
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</section>
<!-- Banner -->
<div class="sec-banner bg0 p-t-40 p-b-50">
    <div class="container">
        <div class="row">
        
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="/template/images/khaivi.jpg" alt="IMG-BANNER" style="height: 250px;">

                    <a href="/danh-muc/7-khai-vi.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                KHAI VỊ
                            </span>

                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                LIST
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="/template/images/monchinh.jpg" alt="IMG-BANNER"  style="height: 250px;">

                    <a href="/danh-muc/4-mon-chinh.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                               MÓN CHÍNH

                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                LIST
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="/template/images/trangmieng.jpg" alt="IMG-BANNER"  style="height: 250px;">

                    <a href="/danh-muc/6-trang-mieng.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                TRÁNG MIỆNG
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                LIST
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>       
        </div>
    </div>
</div>

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Các món ngon
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" id="locall" >
                    Tất Cả
                </button>
                  @foreach ($menus as $menu)
                  <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"  id="{{$menu->id}}" value="{{$menu->name}}">
                    {{$menu->name}}
                  </button>
                  @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div
                    class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Lọc
                </div>

                <div
                    class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Tìm kiếm
                </div>
            </div> 

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" autocomplete="off" name="keyword" id="keyword" placeholder="Tìm món ăn">
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
                                <button class="filter-link stext-106 trans-04" id="sortall">
                                    Mặc định
                                </button>
                            </li>

                            <li class="p-b-6">
                                <button class="filter-link stext-106 trans-04" id="asc">
                                    Giá: Thấp đến cao
                                </button>
                            </li>

                            <li class="p-b-6">
                                <button class="filter-link stext-106 trans-04" id="desc">
                                    Giá: Cao đến thấp
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Giá
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <button  class="filter-link stext-106 trans-04" id="costall">
                                    Tất cả
                                </button>
                            </li>

                            <li class="p-b-6">
                                <button class="filter-link stext-106 trans-04" id="200">
                                    Dưới 200.000 VNĐ
                                </button>
                            </li>

                            <li class="p-b-6">
                                <button class="filter-link stext-106 trans-04" id="250">
                                    200.000 - 500.000 VNĐ
                                </button>
                            </li>
                            <li class="p-b-6">
                                <button class="filter-link stext-106 trans-04" id="500">
                                    Trên 500.000 VNĐ
                                </button>
                            </li>
                        </ul>
                    </div>


                    </div>
                </div>
            </div> 
            <div id="loadProduct">
                @include('products.list')
            </div>
            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
                <input type="hidden" value="1" id="page">
                <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Xem thêm
                </a>
            </div>
       
        </div>
         <script>
         
             </script>

    </section>
@endsection