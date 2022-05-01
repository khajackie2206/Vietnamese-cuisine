@extends('main')
<!-- Cart -->
@section('content')
    <div class="container p-t-80">
        @php
            $tongsao = 0;
            $dem=count($comments);
        @endphp
        @foreach ($comments as $key => $comment)
            @php
            $tongsao += $comment->rating;
            @endphp
        @endforeach
        @php
            $tb = 0;
            if($dem>0)  $tb = $tongsao / $dem;
        @endphp
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
                class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $title }}
            </span>
        </div>
    </div>
    <section class="sec-product-detail bg0 p-t-40 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" role="tablist" style="">
                                    <li class="slick-active" role="presentation">
                                        <img src="{{ $product->thumb }}">
                                        <div class="slick3-dot-overlay">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"><button
                                    class="arrow-slick3 prev-slick3 slick-arrow" style=""><i class="fa fa-angle-left"
                                        aria-hidden="true"></i></button><button class="arrow-slick3 next-slick3 slick-arrow"
                                    style=""><i class="fa fa-angle-right" aria-hidden="true"></i></button></div>

                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1131px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                            data-thumb="images/product-detail-01.jpg" data-slick-index="0"
                                            aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide10"
                                            aria-describedby="slick-slide-control10"
                                            style="width: 377px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $title }}  &nbsp;&nbsp;
                        @php
                        if($dem > 0){
                         echo  '<span class="wrap-rating fs-18 cl11 pointer">';
                         for ($i = 0; $i < $tb; $i++){
                              echo  ' <i class="zmdi zmdi-star"></i>';
                            }
                         for ($i = 0; $i < floor(5- $tb); $i++){
                              echo ' <i class="zmdi zmdi-star-outline"></i>';
                        }
                        echo '</span>';
                        echo '&nbsp;&nbsp; <span style="color: #2f80ed;font-size: 13px;line-height: 17px;">'.$dem.' đánh giá</span>';
                    }
                   
                        @endphp
                      
                        </h4>
                        <span class="mtext-106 cl2">
                            @php
                                if ($product->price_sale != 0) {
                                    echo " <span style='color:red;'>" .
                                        number_format($product->price_sale) .
                                        "</span> VNĐ
             <span style='color: lightgrey;text-decoration:line-through; margin-left:30px;'> " .
                                        number_format($product->price) .
                                        " VNĐ</span>
             ";
                                } else {
                                    echo "
             <span style='color:red;'>" .
                                        number_format($product->price) .
                                        '</span> VNĐ';
                                }
                            @endphp
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <form action="/add-cart" method="POST">
                                        @if ($product->price != null)
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num_product" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>

                                            <button
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                                style="margin-right:30px;">
                                                Add to cart
                                            </button>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            @csrf
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="bor10 m-t-15 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#description" role="tab"
                                aria-expanded="false">Mô tả</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#information" role="tab"
                                aria-expanded="true">Chi tiết sản phẩm</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" onclick="show_comment()"
                                role="tab">Đánh giá sản phẩm</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade" id="description" role="tabpanel" aria-expanded="false">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {!! $product->description !!}
                                </p>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade active show" id="information" role="tabpanel" aria-expanded="true">
                            <div class="row">
                                <div class="how-pos2 p-lr-15-md">
                                    <p class="stext-102 cl6">
                                        {!! $product->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        @foreach ($comments as $key => $comment)
                                            <div class="flex-w flex-t p-b-68">
                                                <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                    <img src="/template/images/comment.png" class="img-circle elevation-2"
                                                        alt="AVATAR">
                                                </div>
                                                <div class="size-207">
                                                    <div class="flex-w flex-sb-m p-b-17">
                                                        <span class="mtext-107 cl2 p-r-20">
                                                            {{ $comment->name }}
                                                        </span>
                                                        <span class="fs-18 cl11">
                                                            @for ($i = 0; $i < $comment->rating; $i++)
                                                                <i class="zmdi zmdi-star"></i>
                                                            @endfor
                                                            @for ($i = 0; $i < floor(5- $comment->rating); $i++)
                                                               <i class="zmdi zmdi-star-outline"></i>
                                                            @endfor
                                                        </span>
                                                    </div>

                                                    <p class="stext-102 cl6">
                                                        {{ $comment->review }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- Add review -->
                                        <form class="w-full" action="{{ url('add_comment') }}" method="POST">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Thêm đánh giá về món ăn
                                            </h5>

                                            <p class="stext-102 cl6">
                                                Bình luận của bạn sẽ được người quản trị kiểm duyệt trước khi hiển thị công
                                                khai
                                            </p>

                                            <div class="flex-w flex-m p-t-50 p-b-23">
                                                <span class="stext-102 cl3 m-r-16">
                                                    Yêu thích
                                                </span>

                                                <span class="wrap-rating fs-18 cl11 pointer">
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <input class="dis-none" type="number" name="rating">
                                                </span>
                                            </div>

                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Đánh giá của bạn</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review" required></textarea>
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Họ và tên</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text"
                                                        name="name" required>
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email"
                                                        type="text" name="email" required>
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="active" value="0">
                                            </div>
                                            <div class="row justify-content-center">
                                                <button
                                                    class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                    Submit
                                                </button>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-50 p-tb-15">


            <span class="stext-107 cl6 p-lr-25">
                Categories: {{ $product->menu->name }}
            </span>
        </div>
    </section>
    <section class="sec-relate-product bg0 p-t-15 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Món liên quan
                </h3>
            </div>
            <div class="row isotope-grid">
                @foreach ($products as $key => $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2 product-cover">
                            <div class="block2-pic hov-img0">
                                <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name) }}.html"
                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"
                                    style="font-size:16px;text-transform: uppercase;">
                                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}" style="height: 200px;">
                                    <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name) }}.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"
                                        style="font-size:16px;text-transform: uppercase;">
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name) }}.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"
                                        style="font-size:16px;text-transform: uppercase;">
                                        &nbsp;&nbsp; {{ $product->name }}
                                    </a>
                                    @php
                                        if ($product->price_sale != 0) {
                                            echo "	<span class='stext-105 cl3'>
                                     &nbsp;&nbsp;
                                    <span style='color: lightgrey;text-decoration:line-through;'> " .
                                                number_format($product->price) .
                                                " VNĐ</span>
                                </span>
                                <span class='stext-105 cl3'>
                                    &nbsp;&nbsp;
                                    <span style='color: red;'>" .
                                                number_format($product->price_sale) .
                                                "</span> VNĐ
                                </span> ";
                                        } else {
                                            echo "
                                <span class='stext-105 cl3'>
                                    &nbsp;&nbsp;
                                    <span style='color: red;'>" .
                                                number_format($product->price) .
                                                "</span> VNĐ
                                </span>
                                <span class='stext-105 cl3'>
                                    <span> &nbsp;</span>
                                </span> ";
                                        }
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#inputSearch').on('keyup', function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "search",
                        type: "get",
                        data: {
                            'search': query
                        },
                        success: function(data) {
                            $('#show-list').html(data);
                        }
                    });
                } else {
                    $('#show-list').html('');
                }
                //end of ajax call
            });
        });
    </script>
    <script>
        document.getElementById('inputSearch').style.display = "none";
        document.getElementById('icon_search').style.display = "none";
    </script>
@endsection
