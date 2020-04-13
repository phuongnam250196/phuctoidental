@extends('frontend.layout')
@section('title', 'Đăng ký tài khoản')
@section('description', 'Đăng ký tài khoản để có thể mua hàng một cách nhanh chóng và tiện lợi hơn')
@section('image', url('/'.infoOther()->logo))
@section('url', url('/register'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Đăng ký, đăng nhập, lấy lại mật khẩu')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div class="main_container col-xs-12">
                    <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;&#47;&nbsp;Tài khoản&nbsp;&#47;&nbsp;Đăng ký</nav>
                    <div class="page_content">
                        <h1 class="title-page">Đăng ký tài khoản</h1>
                        <div class="tinymce">
                            <div class="woocommerce">
                                <div class="u-columns col2-set" id="customer_login">
                                    <div class="u-column1 col-1">
                                        @if(session('message'))
                                            <p class="alert alert-success">{{session('message')}}</p>
                                        @endif
                                        <h2>Đăng ký</h2>
                                        <form class="woocommerce-form woocommerce-form-login login" method="POST">
                                            <p class="form-row">
                                                <label for="username">Tên tài khoản hoặc địa chỉ email&nbsp;<span class="required">*</span></label>
                                                <input type="text" class="input-text" name="email" id="email" autocomplete="email" value="" />
                                                @if($errors->has('email'))
                                                    <p class="help text-danger">{{ $errors->first('email') }}</p>
                                                @endif 
                                            </p>
                                            <p class="form-row">
                                                <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                                                <input class="input-text" type="password" name="password" id="password" autocomplete="password" />
                                                @if($errors->has('password'))
                                                    <p class="help text-danger">{{ $errors->first('password') }}</p>
                                                @endif 
                                            </p>
                                            <p class="form-row">
                                                <label for="password">Xác nhận mật khẩu&nbsp;<span class="required">*</span></label>
                                                <input class="input-text" type="password" name="password_two" id="password_two" autocomplete="password_two" />
                                                @if($errors->has('password_two'))
                                                    <p class="help text-danger">{{ $errors->first('password_two') }}</p>
                                                @endif
                                            </p>
                                            <p class="form-row">
                                                <button type="submit" class="woocommerce-Button button" value="Đăng nhập">Đăng ký</button>
                                                <span style="float: right;padding: 5px 0;">
                                                    <a href="{{url('/account')}}">Đăng nhập</a>
                                                </span>
                                            </p>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .title-page {
                                text-align: center;
                            }
                            .u-column1.col-1 {
                                margin: 0 auto;
                                float: inherit !important;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection