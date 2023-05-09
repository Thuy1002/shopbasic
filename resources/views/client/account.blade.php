@extends('templates.layoutclient')
@section('title', 'san pham')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin cá nhân</h4>
                    </div>
                    <div id="msg-box">
                        <?php //Hiển thị thông báo thành công
                        ?>
                        @if (session('success'))
                            <script>
                                swal({
                                    title: "OK!",
                                    text: "Thay đổi thành công",
                                    icon: "success",
                                });
                            </script>
                            @elseif(session('error'))
                                <script>
                                    swal({
                                        title: "Lỗi!",
                                        text: "Vui lòng nhập lại mật khẩu",
                                        icon: "error",
                                    });
                                </script>

                            @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('change_if', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Họ và tên:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" disabled class="form-control" id="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ:</label>
                                <input type="text" class="form-control" id="email" name="address"
                                    value="{{ $user->address }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="tel" class="form-control" name="number_phone"
                                    value="{{ $user->number_phone }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Đổi mật khẩu</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('change_pass', $user->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="current-password">Mật khẩu hiện tại:</label>
                                <input type="password" name="password" class="form-control" id="current-password">
                            </div>
                            <div class="form-group">
                                <label for="new-password">Mật khẩu mới:</label>
                                <input type="password"name="pass2" class="form-control" id="new-password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Xác nhận mật khẩu:</label>
                                <input type="password" name="pass3" class="form-control" id="confirm-password">
                            </div>
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
