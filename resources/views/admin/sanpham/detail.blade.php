@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage; 
@endphp

@extends('templates.layoutadmin')
@section('title', 'Sửa Sản phẩm')
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

        <?php //Hiển thị thông báo thành công
        ?>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        <?php //Hiển thị thông báo lỗi
        ?>
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif

        <form class="form-horizontal "
            action="{{ route('route_BackEnd_Sanpham_update', ['id' => request()->route('id')]) }}" method="POST"
            role="form" enctype="multipart/form-data">
            @csrf
            <div style="padding-right: 130px;" class="col-md-9">
                <div class="form-group">
                    <label for="ten_de_thi" class="control-label">Tên sản phẩm <span class="text-danger">(*)</span></label>
                    {{-- <input type="text" class="form-control" name="title" id="" placeholder="Sản phẩm"> --}}
                    <input type="text" name="title" id="" class="form-control"
                        value="{{ $objitem_sp->title }}">
                    <span id="mes_sdt"></span>

                </div>

                <div class="form-group">
                    <label class="">Ảnh</label>
                    <div class="">
                        <div class="row">
                            <div class="col-xs-6">
                                <img id="mat_truoc_preview"
                                    src="{{ $objitem_sp->img ? '' . Storage::url($objitem_sp->img) : 'http://placehold.it/100x100' }}"
                                    alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;"
                                    class="img-fluid" />
                                <label for="cmt_truoc">Mặt trước</label><br />
                                <input class="form-control-file @error('cmt_mat_truoc') is-invalid @enderror" id="cmt_truoc"
                                    type="file" name="img" class="form-group">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">Ảnh sản phẩm<span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <div class="row">
                            <div class="col-xs-6">
                                <img id="mat_truoc_preview"
                                     src="{{ Storage::url($objitem_sp->img)}}"
                                   
                                     style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-responsive"/>
                                <label for="cmt_truoc">Mặt trước</label><br/>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input style=" height:50px" type="text" name="describe" id="" class="form-control"
                        value="{{ $objitem_sp->describe }}">
                    <span id="mes_sdt"></span>

                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tên danh mục</label>

                    <select name="id_categories" id="" class="form-control" required="required">
                        <option value=" {{-- {{DB::table('danh_muc')->where('id','=',$objitem_sp->id_categories)->first()->title}} --}}">Chọn</option>
                        @foreach ($dm as $d)
                            <option {{ $d->id == $objitem_sp->id_categories ? 'selected' : '' }} value="{{ $d->id }}">
                                {{ $d->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="">số lượng</label>
                    {{-- <input type="number" class="form-control" name="quantity" id=""> --}}
                    <input type="number" name="quantity" id="" class="form-control"
                        value="{{ $objitem_sp->quantity }}">
                    <span id="mes_sdt"></span>
                </div>
                <div class="form-group">
                    <label for="">Giá</label>
                    {{-- <input type="text" class="form-control" name="price" id="" placeholder=""> --}}
                    <input type="number" name="price" id="" class="form-control"
                        value="{{ $objitem_sp->price }}">
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
                            <input {{ 1 == $objitem_sp->status ? 'checked' : '' }} type="radio" name="status"
                                id="input" value="1"> Còn Hàng
                        </label>
                    </div>
                    <div class="radio">
                        <label for="">
                            <input type="radio" {{ 0 == $objitem_sp->status ? 'checked' : '' }} name="status"
                                id="" value="0">
                            Hết hàng
                        </label>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary">Sửa</button>
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
            $("#cmt_truoc").change(function() {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>
@endsection
