<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    ::selection {
        background-color: #b5e2e7;
    }

    ::-moz-selection {
        background-color: #8ac7d8;
    }

    body {
        background: #3CC;
    }

    .container {
        display: -webkit-flex;
        display: flex;
        height: 100%;
    }

    #logbox {
        padding: 10px;
        margin: 50px auto;
        width: 340px;
        background-color: #fff;
        -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
    }

    h1 {
        text-align: center;
        font-size: 175%;
        color: #757575;
        font-weight: 300;
    }

    h1,
    input {
        font-family: "Open Sans", Helvetica, sans-serif;
    }

    .input {
        width: 75%;
        height: 50px;
        display: block;
        margin: 0 auto 15px;
        padding: 0 15px;
        border: none;
        border-bottom: 2px solid #ebebeb;
    }

    .input:focus {
        outline: none;
        border-bottom-color: #3CC !important;
    }

    .input:hover {
        border-bottom-color: #dcdcdc;
    }

    .input:invalid {
        box-shadow: none;
    }

    .pass:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px white inset;
    }

    .inputButton {
        position: relative;
        width: 85%;
        height: 50px;
        display: block;
        margin: 30px auto 30px;
        color: white;
        background-color: #3CC;
        border: none;
        -webkit-box-shadow: 0 5px 0 #2CADAD;
        -moz-box-shadow: 0 5px 0 #2CADAD;
        box-shadow: 0 5px 0 #2CADAD;
    }

    .inputButton:hover {
        top: 2px;
        -webkit-box-shadow: 0 3px 0 #2CADAD;
        -moz-box-shadow: 0 3px 0 #2CADAD;
        box-shadow: 0 3px 0 #2CADAD;
    }

    .inputButton:active {
        top: 5px;
        box-shadow: none;
    }

    .inputButton:focus {
        outline: none;
    }
</style>

<div class="container">
    <div class="col-md-12">
        <div id="logbox">
            <form method="post" action="/signup">
                @csrf
                <h1>Đăng Ký</h1>
                <input name="name" type="text" placeholder="Họ và tên" class="input pass" />
                {{-- @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif --}}
                <input name="email" type="email" placeholder="Email" class="input pass" />
                {{-- @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif --}}
                <input name="password" type="password" placeholder="Mật khẩu" class="input pass" />
                <div  style="    margin-right: 167px;" class="text-center">
                    <input checked type="checkbox" name="status" value="0" placeholder="" class="" /> <label for="">
                        Xác nhận </label>
                      
                </div>
                {{-- @if ($errors->has('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif --}}
                <input type="submit" value="Đăng ký" class="inputButton" />
                <div class="text-center">
                    already have an account? <a href="/login" id="login_id">login</a>
                </div>
            </form>
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

        </div>
    </div>
    <!--col-md-6-->
