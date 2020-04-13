@extends('frontend.layout')
@section('title', 'Thay đổi địa chỉ')
@section('description', 'Hiển thị form thay đổi thông tin về địa chỉ, Cập nhật thông tin địa chỉ mới')
@section('image', url('/'.infoOther()->logo))
@section('url', url('account/change-address'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'thay đổi địa chỉ')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;/&nbsp;<a href="{{url('account/my-info')}}">Hồ sơ cá nhân</a>&nbsp;/&nbsp;Cập nhật địa chỉ</nav>
                        <h1 class="page-title">Đổi địa chỉ</h1>
                        <div class="term-description">
                            <p>Địa chỉ hiện tại: {{$data->address}}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post">
                                        <p class="form-row">
                                            <label>Địa chỉ mới</label>
                                            <input type="text" class="input-text" name="address" value="{{old('address')}}" /> 
                                            @if($errors->has('address'))
                                                <p class="help text-danger">{{ $errors->first('address') }}</p>
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