<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
        @php if (\Illuminate\Support\Facades\Session::get('carts')) {
                $dem = count(\Illuminate\Support\Facades\Session::get('carts'));
            } else {
                $dem = 0;
        } @endphp
        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="/template/images/logo.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                    data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>


            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li class="active-menu"> <a href="/">Trang chủ</a></li>
                {!! $menusHtml !!}
        
            </ul>
        </div>

        <!-- Test -->
        <div class="container-menu-desktop">
            <div class="wrap-menu-desktop">
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-white shadow-transition"
                    data-navbar-on-scroll="data-navbar-on-scroll"
                    style="background-image: none; background-color: rgba(255, 255, 255, 0); transition: none 0s ease 0s;">
                    <div class="container"><a class="navbar-brand d-inline-flex" href="index.html"> <a href="#"
                                class="logo">
                                <img src="/template/images/logo.png" style="width:120px;" alt="IMG-LOGO">
                            </a>

                            <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0"
                                id="navbarSupportedContent">
                                <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
                                    <span class="menu-desktop">
                                        <ul class="main-menu">

                                            <li class="active-menu"> <a href="/">TRANG CHỦ</a></li>
                                            {!! $menusHtml !!}
                                        </ul>
                                    </span>
                                </div>
                                <div class="wrap-icon-header flex-w flex-r-m">
                                    <div class="row justify-content-center">
                                        <div class="col-md-5"
                                            style="position:absolute;margin-top:20px;margin-left:550px; z-index:1;">
                                            <div class="list-group" id="show-list">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                        <input class="form-control mr-sm-2" type="text" autocomplete="off"
                                            name="inputSearch" id="inputSearch" placeholder="Tìm sản phẩm"
                                            aria-label="Search">
                                    </div>

                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"
                                        style="margin-left: -35px;" id="icon_search">
                                        <button class="btn btn-success"
                                            style="background-color: #eee;border: 1px solid rgba(0,0,0,.15);"
                                            name="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" style="color: black;" class="bi bi-search"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg></button>
                                    </div>

                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                                        data-notify="{{ $dem }}">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                   <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div>
                                -->
                                </div>
                            </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</body>

</html>
