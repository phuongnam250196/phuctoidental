@extends('frontend.layout')
@section('title', 'Đăng nhập thành công')
@section('description', 'Bạn có thể thực hiện được các chức năng có trong hệ thống')
@section('image', url('/'.infoOther()->logo))
@section('url', url('support'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Đăng nhập thành công')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;/&nbsp;Đăng nhập thành công</nav>
                        <h2 class="page-title">Đăng nhập thành công</h2>
                        <div class="term-description">
                            <p>Mua Đăng nhập thành công chính hãng tại TECH360 để nhận được nhiều ưu đãi, khuyến mại, quà tặng hấp dẫn, tặng ngay tài khoản VIP, bộ ứng dụng giải trí cao cấp</p>
                        </div>
                        <div class="woocommerce-notices-wrapper"></div>
                        
                        
                    </div>
                </div>
                @include('frontend.nav.aside_account')
            </div>
        </div>
    </div>
@endsection