<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập trang quản trị</title>
    <meta name="description" content="Quản lý thông tin website, quản lý thêm bài viết, quản ly thêm video, quản lý sản phẩm, hỗ trợ khác hàng, quản lý tài khoản, quản lý đơn hàng"/>
    <link rel="icon" href="{{url('/vlnk')}}/images/logo.png" sizes="192x192" />
    <link rel="canonical" href="@yield('url')" />
    <meta name="keywords" content="Đăng nhập, admin, trang quảng trị, xác thực" />
    <meta property="og:title" content="Đăng nhập trang quản trị" />
    <meta property="og:description" content="Quản lý thông tin website, quản lý thêm bài viết, quản ly thêm video, quản lý sản phẩm, hỗ trợ khác hàng, quản lý tài khoản, quản lý đơn hàng" />
    <meta property="og:site_name" content="@yield('sitename')" />
    <meta property="og:image" content="{{url('/vlnk')}}/images/logo.png" />
    <meta property="og:url" content="{{url('/login')}}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="550" />
    <meta name="twitter:description" content="Quản lý thông tin website, quản lý thêm bài viết, quản ly thêm video, quản lý sản phẩm, hỗ trợ khác hàng, quản lý tài khoản, quản lý đơn hàng" />
    <meta name="twitter:title" content="Đăng nhập trang quản trị" />
    <meta name="twitter:image" content="{{url('/vlnk')}}/images/logo.png" />
    <meta name="twitter:url" content="{{url('/login')}}" />
    <link href="{{url('/coolAdmin')}}/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="{{url('/coolAdmin')}}/css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo" style="margin-bottom: 10px;">
                            <a href="{{url('/')}}">
                                <h1>TPN</h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    @if($errors->has('email'))
                                        <p class="help text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    @if($errors->has('password'))
                                        <p class="help text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng nhập</button>
                                {{csrf_field()}}
                            </form>
                            <div class="register-link">
                                <p>
                                    Quay lại trang chủ
                                    <a href="{{url('/')}}">vlnk</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('/coolAdmin')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{url('/coolAdmin')}}/js/bootstrap.min.js"></script>
</body>

</html>