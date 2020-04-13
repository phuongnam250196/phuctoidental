@extends('frontend.layout')
@section('title', 'Đăng nhập')
@section('description', 'Giúp người dùng có thể đăng nhập vào hệ thống')
@section('image', url('/'.infoOther()->logo))
@section('url', url('/login'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Đăng ký, đăng nhập, lấy lại mật khẩu')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div class="main_container col-xs-12">
                    <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;&#47;&nbsp;Tài khoản&nbsp;&#47;&nbsp;Đăng nhập</nav>
                    <div class="page_content">
                        <h1 class="title-page">Tài khoản của tôi</h1>
                        <div class="tinymce">
                            <div class="woocommerce">
                                <div class="u-columns col2-set" id="customer_login">
                                    <div class="u-column1 col-1">
                                        <h2>Đăng nhập</h2>
                                        <form class="login" method="post">
                                            <p class="form-row">
                                                <label>Tên tài khoản hoặc địa chỉ email&nbsp;<span class="required">*</span></label>
                                                <input type="email" class="input-text" name="email" id="email" autocomplete="email" value="" /> 
                                                @if($errors->has('email'))
                                                    <p class="help text-danger">{{ $errors->first('email') }}</p>
                                                @endif
                                            </p>
                                            <p class="form-row">
                                                <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                                                <input class="input-text" type="password" name="password" id="password" autocomplete="current-password" />
                                                @if($errors->has('password'))
                                                    <p class="help text-danger">{{ $errors->first('password') }}</p>
                                                @endif
                                            </p>
                                            <p class="form-row">
                                                <input name="remember" type="checkbox" id="remember" value="nho" /> <span><strong>Ghi nhớ</strong></span>
                                            </p>
                                            <p class="form-row">
                                                <button type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập">Đăng nhập</button>
                                                <span style="float: right;padding: 5px 0;">
                                                    <a href="{{url('/register')}}">Đăng ký</a> | 
                                                    <a href="{{url('/forgot')}}">Quên mật khẩu?</a>
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