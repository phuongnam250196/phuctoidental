@extends('frontend.layout')
@section('title', 'Hồ sơ của tôi')
@section('description', 'Hiển thị thông tin cá nhân, Cập nhật thông tin tài khoản')
@section('image', url('/'.infoOther()->logo))
@section('url', url('account/info'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Hồ sơ cá nhân, cập nhật thông tin, họ tên, địa chỉ')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;/&nbsp;Hồ sơ cá nhân</nav>
                        <h1 class="page-title">Hồ sơ của tôi</h1>
                        <div class="term-description">
                            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản.</p>
                            <br>
                            <p>Họ tên: {{$data->name}} <a href="{{url('account/change-name')}}" style="color: blue;text-decoration: underline;font-size: 11px;">Thay đổi</a></p>
                            <p>Email: {{$data->email}}</p>
                            <p>Số điện thoại: *******{{substr($data->phone, -3, 3)}} <a href="{{url('account/change-phone')}}" style="color: blue;text-decoration: underline;font-size: 11px;">Thay đổi</a></p>
                            <p>Địa chỉ: {{$data->address}} <a href="{{url('account/change-address')}}" style="color: blue;text-decoration: underline;font-size: 11px;">Thay đổi</a></p>
                        </div>
                        <div class="woocommerce-notices-wrapper"></div>
                        
                        
                    </div>
                </div>
                @include('frontend.nav.aside_account')
            </div>
        </div>
    </div>
@endsection