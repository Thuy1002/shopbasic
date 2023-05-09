@extends('templates.layoutadmin')
@section('title', 'Thêm mới sản phẩm')
@section('content')
    <!-- Main content -->
    <section class="content appTuyenSinh">
        <link rel="stylesheet" href="{{ asset('default/bower_components/select2/dist/css/select2.min.css') }} ">
        <style>
            .select2-container--default .select2-selection--single,
            .select2-selection .select2-selection--single {
                padding: 3px 0px;
                height: 30px;
            }

            .select2-container {
                margin-top: -5px;
            }

            option {
                white-space: nowrap;
            }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 1px solid #aaa;
                border-radius: 0px;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                color: #216992;
            }

            .select2-container--default .select2-selection--multiple {
                margin-top: 10px;
                border-radius: 0;
            }

            .select2-container--default .select2-results__group {
                background-color: #eeeeee;
            }
        </style>

        <div id="msg-box">
            <?php //Hiển thị thông báo thành công
            ?>
            @if (session('success'))
                <script>
                    swal({
                        title: "OK!",
                        text: "Xóa thành công",
                        icon: "success",
                    });
                </script>
            @endif
        </div>

        <form class="form-horizontal " action="{{ route('route_BackEnd_Sanpham_Store') }}" method="POST" role="form"
            enctype="multipart/form-data">
            @csrf
            <div style="padding-right: 130px;" class="col-md-9">
                <div class="form-group">
                    <label for="ten_de_thi" class="control-label">Tên sản phẩm <span class="text-danger">(*)</span></label>
                    {{-- <input type="text" class="form-control" name="title" id="" placeholder="Sản phẩm"> --}}
                    <input type="text" name="title" id="" class="form-control"
                        value="@isset($request['title']) {{ $request['title'] }} @endisset">
                    <span id="mes_sdt"></span>

                </div>
                <div class="form-group">
                    <label class="">Ảnh</label>
                    <div class="">
                        <div class="row">
                            <div class="col-xs-6">
                                <img id="mat_truoc_preview"
                                    src="https://dbk.vn/uploads/ckfinder/images/tin-tuc-1/anh-ma-kinh-di-1.jpg"
                                    alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;"
                                    class="img-fluid" />
                                <input type="file" name="img" accept="image/*"
                                    class="form-control-file @error('img') is-invalid @enderror" id="img">
                                <label for="img">Mặt trước</label><br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea style="    height: 200px;" name="describe" id="content" class="form-control"></textarea>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <select name="categories_id" id="" class="form-control" required="required">
                        <option value="">ABC</option>
                        @foreach ($dm as $d)
                            <option value="{{ $d->id }}">{{ $d->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="">số lượng</label>
                    {{-- <input type="number" class="form-control" name="quantity" id=""> --}}
                    <input type="number" name="quantity" id="" class="form-control"
                        value="@isset($request['quantity']) {{ $request['quantity'] }} @endisset">
                    <span id="mes_sdt"></span>
                </div>
                <div class="form-group">
                    <label for="">Giá</label>
                    {{-- <input type="text" class="form-control" name="price" id="" placeholder=""> --}}
                    <input type="number" name="price" id="" class="form-control"
                        value="@isset($request['price']) {{ $request['price'] }} @endisset">
                    <span id="mes_sdt"></span>
                </div>
                {{-- <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <input type="number" class="form-control" name="khuyen_mai" id="" placeholder="">
                </div> --}}
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="status" id="input" value="1" checked> Còn Hàng
                        </label>
                    </div>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="status" id="" value="0"> Hết hàng
                        </label>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary">Tạo Mới</button>
            </div>

    </section>
@endsection
@section('script')
    <script src="{{ asset('default/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('default/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script>
        $(function() {
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#img").change(function() {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>
@endsection
