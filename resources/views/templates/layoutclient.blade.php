@include('sweetalert::alert')
@php
    $objUser = \Illuminate\Support\Facades\Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Goét Sai Seo Ling Phôn sừ</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../clientA/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="../clientA/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="../clientA/css/slick-theme.css" />
  
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="../clientA/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../clientA/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../clientA/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.10/dist/sweetalert2.all.min.js"></script>
 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>
<style>
    /* Thay đổi màu sắc của chữ */

    marquee {
        color: #171616;
        font-size: 1.5rem;
        font-weight: bold;
        ;
    }

    /* Thay đổi độ rộng của chữ */

    marquee::before,
    marquee::after {
        content: "";
        display: inline-block;
        width: 20%;
    }


    /* Slideshow container */
    .slideshow-container {
        max-width: 100%;
        position: relative;
        margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;

        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {}

    /* Caption text */
    .text {

        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {

        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;

        border-radius: 50%;
        display: inline-block;
        /* transition: background-color 0.6s ease; */
    }

    .active,
    .dot:hover {}

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 10s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }
</style>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> {{ $objUser->email }}</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 66 Nguyễn Hoàng - Mai Dịch - Cầu Giấy - Hà
                            Nội </a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> 7 Million</a></li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <i class="fa fa-user-o"></i><span class="hidden-xs"> {{ $objUser->name }} </span>
                        </a>
                        <ul style="    background: #ffff;
                        text-align: center;
                    "
                            class="dropdown-menu">
                            <li>
                                <p style="padding: 10px;font-weight:600;">
                                    <i class="fa fa-user"></i>{{ $objUser->email }}<br>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a style="font-weight:600;" href="{{ route('logout') }}"
                                        class="  btn btn-success btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="../clientA/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="{{ route('route_tim_kiem') }}" method="GET">
                                <select class="input-select">
                                    <option value="0">Nhãn Hàng</option>

                                    {{-- @foreach ($dm as $l)
                                        <option style="color: black" value="1">
                                            <a href="{{ route('route_Fe_dmsp', [$l->id]) }}">{{ $l->title }}</a>
                                        </option>
                                    @endforeach --}}
                                </select>
                                <input class="input" type="text" name="key" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">2</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a href="{{ route('cartList') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty">3</div>
                                </a>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul style="" class=" main-nav nav navbar-nav "> {{--  --}}
                    <li class="active"><a style="font-weight:600;" href="http://127.0.0.1:8000/">Trang Chủ</a></li>
                    <li><a style="font-weight:600;" href="http://127.0.0.1:8000/store">Cửa Hàng</a></li>
                    <li><a style="font-weight:600;" href="#">Giới Thiệu</a></li>
                    <li><a style="font-weight:600;" href="#">Trợ Giúp</a></li>
                    {{-- <li><a href="#">Cameras</a></li>
                    <li><a href="#">Accessories</a></li> --}}
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <div class="section">

        <div class="slideshow-container">


            @foreach ($banner as $b)
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="{{ asset('storage/images/'.$b->img) }}" style="height: 465px;width:1476px;">
                    <div class="text">{{ $b->title }}</div>
                </div>
            @endforeach

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        {{-- The dots/circles  --}}
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>


    </div>

    </div>

    <div> {{-- conten --}}
        @yield('content')


    </div>
    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Về chúng tôi</h3>
                            <p>Là một công ty lớn xuất hiện đầu tiên tại Việt Nam. Với quy mô lớn được các khách hàng
                                tin dùng và hưởng úng mỗi khi đưa ra sản phẩm mới</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>66 Nguyễn Hoàng, Mai Dịch, Cầu
                                        Giấy, Hà Nội</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>0987888888</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>thuydeptrai@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Danh Mục</h3>
                            <ul class="footer-links">
                                <li><a href="#">Đang nổi</a></li>
                                <li><a href="#">Giảm Giá Mạnh</a></li>
                                <li><a href="#">Vivo</a></li>
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Samsung</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Thông tin về chúng tôi</h3>
                            <ul class="footer-links">
                                <li><a href="#">Chuyên price lừa đảo, chuyên lừa lấy lòng khách hàng bằng nhiều
                                        hình thức khác nhau</a></li>
                                <li><a href="#">Tạo các sự kiện lớn như mua 2 tính tiền 2</a></li>
                                <li><a href="#">Giá cả trên trời</a></li>
                                <li><a href="#">Trả góp lãi suất 0%</a></li>
                                <li><a href="#">Không có bảo hành</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Khách hàng và chúng tôi</h3>
                            <ul class="footer-links">
                                <li><a href="#">Cọc lên là đánh</a></li>
                                <li><a href="#">Vào là phải mua</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="../clientA/js/jquery.min.js"></script>
    <script src="../clientA/js/bootstrap.min.js"></script>
    <script src="../clientA/js/slick.min.js"></script>
    <script src="../clientA/js/nouislider.min.js"></script>
    <script src="../clientA/js/jquery.zoom.min.js"></script>
    <script src="../clientA/js/main.js"></script>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fyi7g4x4u3LrUdi0Rif5KTI7Zn8Wg
     Yd1ck+5tw"
        crossorigin="anonymous" />
    <!-- JS của Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwF
             DMXNAcVivzIaAiCfKpOp" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fak
             FPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquV
             dAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
