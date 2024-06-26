<!doctype html>
<html lang="en">

<head>
    <title>Sign Up 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('register/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sign Up #01</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <div class="login-wrap">
                        <h3 class="mb-4 text-center">Create Your Account</h3>
                        <form method="post" action="{{ route('auth.singup') }}" enctype="multipart/form-data"
                        
                            id="" class="signup-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="text" name="name" class="form-control" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="number" name="number_phone" class="form-control" placeholder="phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <input type="email" name="email" class="form-control" placeholder="examp@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <input type="text" name="address" class="form-control" placeholder="adress">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="password" name="re_password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex">
                                        <button type="submit" class="btn btn-primary rounded submit p-3">Sign
                                            Up</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="w-100 social-wrap">
                            <p>
                                <span>or Signup with this services below</span>
                            </p>
                            <p class="social-media d-flex justify-content-center">
                                <a href="#"
                                    class="social-icon facebook d-flex align-items-center justify-content-center"><span
                                        class="fa fa-facebook"></span> Facebook</a>
                                <a href="#"
                                    class="social-icon twitter d-flex align-items-center justify-content-center"><span
                                        class="fa fa-twitter"></span> Twitter</a>
                            </p>
                            <p class="mt-4">I'm already a member! <a href="#signin">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('register/js/jquery.min.js') }}"></script>
    <script src="{{ asset('register/js/popper.js') }}"></script>
    <script src="{{ asset('register/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('register/js/main.js') }}"></script>

</body>

</html>
