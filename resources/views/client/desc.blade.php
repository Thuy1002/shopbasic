@php
    
@endphp
@extends('templates.layoutclient')
@section('content')
    <!-- BREADCRUMB -->
    {{--  --}}
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Hãng nổi tiếng</h3>
                        <div class="checkbox-filter">
                            @foreach ($dm as $d)
                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        <a href="{{ route('route_Fe_dmsp', [$d->id]) }}">{{ $d->title }}</a>

                                        <small>(120)</small>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-filter clearfix">
                            <div class="store-sort" style="display: flex;">
                                <label>
                                    sắp xếp theo giá:
                                </label>
                                <div>
                                    <button class="btn btn-success" onclick="location.href='{{ route('asc') }}'">Thấp đến
                                        cao</button>
                                    <button class="btn" onclick="location.href='{{ route('desc') }}'">Cao đến
                                        thấp</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /store top filter -->
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
                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @foreach ($products as $l)
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ Storage::url($l->img) }}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">{{ $l->status == 0 ? 'Hết hàng' : 'New' }}</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        {{-- <p class="product-category">Category</p> --}}
                                        <h3 class="product-name"><a href="#">{{ $l->title }}</a></h3>
                                        <h4 class="product-price">${{ $l->price }} <del
                                                class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button onclick="location.href='{{ route('route_Fe_Ctsp', [$l->id]) }}}}'"><i
                                                    class="fa fa-eye"></i><span class="">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form action="{{ route('addToCart', $l->id) }}" method="POST">
                                            @csrf
                                            <button class="add-to-cart-btn" type="submit"> <i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- /product -->

                        <!-- product -->

                        <!-- /product -->

                        <div class="clearfix visible-sm visible-xs"></div>

                        <!-- product -->

                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty"></span>
                        <div style="text-align: center;">
                            {{ $products->appends($extParams)->links() }}
                        </div>

                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

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
