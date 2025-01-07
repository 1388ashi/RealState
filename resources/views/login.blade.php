<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>

    <!-- Title -->
    <title>ورود</title>

    <!--Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Style css -->
    <link href="{{ asset('assets/css-rtl/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css-rtl/dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{ asset('assets/css-rtl/animated.css') }}" rel="stylesheet" />

    <!---Icons css-->
    <link href="{{ asset('assets/css-rtl/icons.css') }}" rel="stylesheet" />

    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- P-scroll bar css-->
    <link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css-rtl/custom.css') }}" rel="stylesheet" />
</head>
<body style="overflow: hidden; height: 100%; font-family: 'IRANSans-web'">
    <div class="page login-bg">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-md-7 col-lg-4">
                                <div class="card">
                                    <div class="p-4 pt-6 text-center">
                                        <h1 class="mb-2">ورود</h1>
                                        <p class="text-muted">از طریق فرم زیر می توانید به پنل مدیریت وارد شوید.</p>
                                    </div>
                                    <form class="card-body pt-3" id="login" name="login" method="post" action="{{ route('admin.login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="password">کلمه عبور</label>
                                            <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password" minlength="3" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="submit">
                                            <button class="btn btn-primary btn-block" type="submit">ورود</button>
                                        </div>
                                    </form>
{{--                                    <div class="card-body border-top-0 pb-6 pt-2">--}}
{{--                                        <div class="text-center">--}}
{{--                                            <span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-facebook-line"></i></span>--}}
{{--                                            <span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-instagram-line"></i></span>--}}
{{--                                            <span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-twitter-line"></i></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap4 js-->
<script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Select2 js -->
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

<!-- P-scroll js-->
<script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>

<!-- Custom js-->
<script src="{{ asset('assets/js/custom.js') }}"></script>


</body>
</html>
