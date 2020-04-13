@extends('frontend.layout')
@section('title', 'Lịch sử mua hàng')
@section('description', 'Hiển thị lịch sử mua hàng của tài khoản')
@section('image', url('/'.infoOther()->logo))
@section('url', url('account/history'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Lịch sử, lịch sử mua hàng')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;/&nbsp;Lịch sử mua hàng</nav>
                        <h1 class="page-title">Lịch sử mua hàng</h1>
                        <div class="term-description">
                            @foreach($data as $key=>$dat)
                            <div class="shopee-notigroup">
                                <div class="notification-card notification-card--group-primary">
                                    <div class="notification-card__connector notification-card__connector--single"></div>
                                    <div class="notification-card__image"><div class="notification-card__img-background" style="background-image: url({{url('/'.$dat->products->prod_img)}});"></div></div>
                                    <div class="notification-card__detail">
                                        <div class="notification-card__title">Giao hàng thành công</div>
                                        <div class="notification-card__content">Bạn vui lòng kiểm tra tất cả sản phẩm trong đơn hàng <b>{{$dat->orders->code}}</b> - đã giao ngày <b>{{$dat->orders->created_at}}</b>. Nếu bạn hài lòng với sản phẩm, hãy xác nhận đã nhận hàng trong vòng <b>3</b> ngày để người bán được nhận tiền sớm hơn. Đừng quên đánh giá sản phẩm nhé!</div>
                                        <div class="notification-card__info">
                                            <div class="notification-card__time"> {{$dat->created_at}} </div>
                                            <div class="notification-card__collapse"><svg class="shopee-svg-icon icon-arrow-down" enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0"><g><path d="m11 2.5c0 .1 0 .2-.1.3l-5 6c-.1.1-.3.2-.4.2s-.3-.1-.4-.2l-5-6c-.2-.2-.1-.5.1-.7s.5-.1.7.1l4.6 5.5 4.6-5.5c.2-.2.5-.2.7-.1.1.1.2.3.2.4z"></path></g></svg></div>
                                        </div>
                                    </div>
                                    <div class="notification-card__button"><a class="shopee-button-outline ">Xem Chi tiết đơn hàng</a></div>
                                </div>
                                <div class="notification-page__divider notification-page__divider--transparent"></div>
                            </div>
                            @endforeach
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