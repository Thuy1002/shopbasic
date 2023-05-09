@php
    use Illuminate\Support\Facades\DB;
@endphp

@extends('templates.layoutclient')
@section('content')
    <style>
        #reviews {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 20px;
        }

        .reviews {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .reviews li {
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
            padding-bottom: 20px;
            position: relative;
        }

        .actions {
            position: absolute;
            top: 5px;
            right: 5px;
        }

        .btn-edit,
        .btn-delete {
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 14px;
            margin-left: 5px;
            text-decoration: underline;
        }

        .actions {
            display: flex;
            align-items: center;
        }

        .actions button {
            border: 1px solid #ffffff;
            margin: 0 5px;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-edit {
            background-color: #1b86f9;
        }

        .btn-edit:hover {
            background-color: #0761c1;
        }

        .btn-delete {
            background-color: #f38893;
        }

        .btn-delete:hover {
            background-color: #c72d3d;
        }
    </style>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>


                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>


                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>

                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('storage/images/' . $objitem->img) }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <div>
                            @if (session('success'))
                                <div style="font-weight:900;" class=" alert alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if (session('failed'))
                                <div style="font-weight:900;" class="alert alert-dismissible fade show" role="alert">
                                    {{ session('failed') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <h2 class="product-name">{{ $objitem->title }}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">${{ $objitem->price }}<del class="product-old-price">$990.00</del>
                            </h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p>{{ $objitem->describe }}</p>
                        <div class="add-to-cart">
                            <div class="add-to-cart">
                                <form action="{{ route('addToCart', $objitem->id) }}" method="POST">
                                    @csrf
                                    <button class="add-to-cart-btn" type="submit"> <i class="fa fa-shopping-cart"></i>Thêm
                                        vào giỏ hàng</button>
                                </form>
                            </div>

                        </div>

                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i>Thêm vào danh sách yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> Thêm vào để so sánh</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Hãng:</li>
                            {{-- <li><a href="">{{DB::table('danh_muc')->where('id',$objitem->categories_id)->first()->title}}</a></li> --}}

                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Bình luận</a></li>
                            <li><a data-toggle="tab" href="#tab2">Chi tiết (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class=" tab-pane  in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="reviews">
                                            <ul class="reviews reviews list-unstyled border border-secondary rounded p-3">
                                                @foreach ($comments as $com)
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">{{ $com->user->name }}</h5>
                                                            <p class="date">{{ $com->created_at }}</p>
                                                        </div>

                                                        <div class="review-body">
                                                            <p class="" style="height:80px;">
                                                                {{ $com->content }}</p>
                                                            @if (auth()->user()->id == $com->user_id)
                                                                <div class="actions">
                                                                    <button class="btn btn-edit">Sửa</button>
                                                                    <a href="{{ route('delete', $com->id) }}"
                                                                        onclick="return confirm('Có muốn xóa không?')"
                                                                        class="btn btn-delete">Xóa</a>
                                                                </div>
                                                            @endif
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-12">
                                        <div id="review-form">
                                            <form class="review-form" action="{{ route('comment') }}"
                                                enctype="multipart/form-data" method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="products_id" value="{{ $objitem->id }}">
                                                <textarea class="input" name="content" placeholder="Bình luận"></textarea>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fupricet nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="../clientA/img/product01.png" alt="">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                            </div>
                        </div>
                        <div class="product-body">

                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->



            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
@endsection
