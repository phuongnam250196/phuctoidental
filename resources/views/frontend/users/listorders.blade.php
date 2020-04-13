@extends('frontend.layout')
@section('title', 'Đơn hàng')
@section('description', 'Hiển thị danh sách đơn hàng chờ thanh toán, Xác nhận đã nhận hàng')
@section('image', url('/'.infoOther()->logo))
@section('url', url('account/orders'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Danh sách đơn hàng')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;/&nbsp;Đơn hàng</nav>
                        <h1 class="page-title">Danh sách đơn hàng</h1>
                        <div class="term-description">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Đơn hàng</th>
                                    <th>Ngày đặt</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$dat)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><a class="product_id" data-id="{{$dat->products->id}}" href="{{url('/product/'.$dat->products->prod_slug)}}">{{$dat->products->prod_name}}</a></td>
                                        <td>{{$dat->amount}}</td>
                                        <td>{{number_format($dat->price, 0, '.', '.')}} vnđ</td>
                                        <td>{{!empty($dat->orders->code)?$dat->orders->code:''}}</td>
                                        <td>{{date_format($dat->created_at, 'd-m-Y')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$data->links()}}
                        </div>

                        <div class="woocommerce-notices-wrapper"></div>
                        
                        
                    </div>
                </div>
                @include('frontend.nav.aside_account')
            </div>
        </div>
    </div>
@endsection