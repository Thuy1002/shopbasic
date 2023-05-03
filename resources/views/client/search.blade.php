@extends('templates.layoutclient')
@section('content')

        <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản Phẩm HOT</h3>
							<div class="section-nav">
							</div>
						</div>
					</div>
					<!-- /section title -->
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
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										@foreach($search as $l)
										<div class="product">
											<div class="product-img">
												{{-- <img src="../clientA/img/product01.png" alt=""> --}}
												<img src="{{Storage::url($l->img)}}" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">{{$l->status == 0?'Hết hàng': 'New'}}</span>
												</div>
											</div>
											<div class="product-body">
												{{-- <p class="product-category">Category</p> --}}
												<h3 class="product-name"><a href="#">{{$l->title}}</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><a style="color: #ffff; font-weight:600;" href="{{ route('route_Fe_Ctsp',[$l->id]) }}">Xem</a></span></button>
													
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
										@endforeach
										<!-- /product -->

									
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- /SECTION -->

        <!-- HOT DEAL SECTION -->
        <div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
@endsection