@extends('frontend.layout')
@section('title', 'Thay đổi họ tên')
@section('description', 'Hiển thị form thay đổi thông tin cá nhân, Cập nhật thông tin về họ tên')
@section('image', url('/'.infoOther()->logo))
@section('url', url('account/change-name'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'thay đổi họ tên')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;/&nbsp;<a href="{{url('account/my-info')}}">Hồ sơ cá nhân</a>&nbsp;/&nbsp;Cập nhật họ tên</nav>
                        <h1 class="page-title">Đổi họ tên</h1>
                        <div class="term-description">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post">
                                        <p class="form-row">
                                            <label>Họ tên</label>
                                            <input type="text" class="input-text" name="name" value="{{old('name')}}" /> 
                                            @if($errors->has('name'))
                                                <p class="help text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </p>
                                        
                                        <p class="form-row">
                                            <button type="submit" class="woocommerce-Button button">Cập nhật</button>
                                        </p>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="woocommerce-notices-wrapper"></div>
                        
                        
                    </div>
                </div>
                @include('frontend.nav.aside_account')
            </div>
        </div>
    </div>
@endsection