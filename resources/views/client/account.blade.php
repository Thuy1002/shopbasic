@extends('templates.layoutclient')
@section('title', 'san pham')
@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin cá nhân</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Họ và tên:</label>
                                <input type="text" class="form-control" id="name" value="Nguyễn Văn A">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="nguyenvana@example.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="phone" value="0123456789">
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
                        <form>
                            <div class="form-group">
                                <label for="current-password">Mật khẩu hiện tại:</label>
                                <input type="password" class="form-control" id="current-password">
                            </div>
                            <div class="form-group">
                                <label for="new-password">Mật khẩu mới:</label>
                                <input type="password" class="form-control" id="new-password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Xác nhận mật khẩu:</label>
                                <input type="password" class="form-control" id="confirm-password">
                            </div>
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
