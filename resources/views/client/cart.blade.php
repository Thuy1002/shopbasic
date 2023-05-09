<?php
use Illuminate\Support\Facades\DB;
?>
@extends('templates.layoutclient')
@section('content')
    <h2>Giỏ hàng của bạn</h2>
    @if (session('success'))
        <div style="font-weight:900;" class="alert alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $item)
                <tr>
                    <td>{{ $item->products->id }}</td>
                    <td>{{ $item->products->title }}</td>
                    <td>
                        <img style="width:10%;" class="img-fluid" src="{{ Storage::url($item->products->img) }}" alt="Ảnh sản phẩm">
                    </td>
                    <td>{{ number_format($item->products->price) }} VNĐ</td>
                    <td>
                        <a href="{{ route('cart_delete', $item->id) }}" onclick="return confirm('Có muốn xóa không?')"
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Xóa    </a>
                            </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Tổng tiền:
                    <span id="total-price" class="badge badge-primary badge-pill">{{ number_format($carts_total->sum('price')) }}.VNĐ</span>
                </li>
                <li id="discount-li" class="list-group-item d-flex justify-content-between align-items-center"
                    style="display:none;">
                    Giảm giá:
                    <span id="discount-amount" class="badge badge-primary badge-pill">0.VNĐ</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Thành tiền:
                    <span id="final-price" class="badge badge-primary badge-pill">{{ number_format($carts_total->sum('price')) }}.VNĐ</span>
                </li>
                <li class="list-group-item d-flex justify-content-end">
                    <a href="{{ route('check') }}" class="btn btn-primary">Thanh toán</a>
                </li>
            </ul>
        </div>
    </div>
    

    <script>
        var discountForm = document.getElementById("discount-form");
        var totalPrice = document.getElementById("total-price");
        var discountLi = document.getElementById("discount-li");
        var discountAmount = document.getElementById("discount-amount");
        var finalPrice = document.getElementById("final-price");

        // Gán giá trị mặc định cho tổng tiền và giá giảm giá
        var cartsTotal = {{ $carts_total->sum('price') }};
        var discount = 0;
        var finalPriceValue = cartsTotal;
        discountForm.addEventListener("submit", function(event) {
            event.preventDefault();

            var code = document.getElementById("code").value;

            $.ajax({
                type: "POST",
                url: "discount_check",
                data: {
                    code: code,
                    total: cartsTotal
                },
                success: function(response) {
                    if (response.success) {
                        // Cập nhật giá giảm giá và giá cuối cùng
                        discount = response.discount;
                        finalPriceValue = cartsTotal - discount;

                        // Hiển thị giá giảm giá và giá cuối cùng
                        discountAmount.textContent = discount.toLocaleString() + ".VNĐ";
                        finalPrice.textContent = finalPriceValue.toLocaleString() + ".VNĐ";

                        // Hiển thị thông tin giảm giá
                        discountLi.style.display = "flex";
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert("Có lỗi xảy ra khi kết nối đến server!");
                }
            });
        });
        // Cập nhật giá trị HTML của các phần tử
        totalPrice.textContent = cartsTotal.toLocaleString() + ".
    </script>
@endsection
