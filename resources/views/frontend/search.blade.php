@extends('frontend.layout')
@section('title', 'Tìm kiếm '.$_GET['keyword'])
@section('description', 'Tìm kiếm tất cả sản phẩm tương ứng với từ khóa: '.$_GET['keyword'])
@section('image', url('/'.infoOther()->logo))
@section('url', url('search?keyword='.$_GET['keyword']))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', $_GET['keyword'])
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;&#47;&nbsp;Kết quả tìm kiếm cho &ldquo;{{$_GET['keyword']}}&rdquo;</nav>
                        <h1 class="page-title">Kết quả tìm kiếm: &ldquo;{{$_GET['keyword']}}&rdquo;</h1>
                        <p class="woocommerce-result-count">
                            Hiển thị {{count($data)}} sản phẩm</p>
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby">
                                <option value="relevance" selected='selected'>Độ liên quan</option>
                                <option value="popularity">Phổ biến nhất</option>
                                <option value="rating">Đánh giá cao nhất</option>
                                <option value="date">Mới nhất</option>
                                <option value="price">Giá thấp đến cao</option>
                                <option value="price-desc">Giá cao xuống thấp</option>
                            </select>
                            <input type="hidden" name="paged" value="1" />
                            <input type="hidden" name="s" value="Android" /><input type="hidden" name="post_type" value="product" /></form>
                        <ul class="products columns-4">
                            @foreach($data as $key=>$dat)
                                <li class="product type-product">
                                    <div class="shop_loop_box">
                                        <a data-id="{{$dat->id}}" href="{{url('/product/'.$dat->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                            @if(!empty($dat->prod_sale))
                                                <span class="onsale">Giảm giá!</span>
                                            @endif
                                            <img width="300" height="300" src="{{url('/'.$dat->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/>
                                        </a>
                                        <a data-price="{{$prod->prod_price_sale}}" data-product_id="{{$prod->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a> 
                                    </div>
                                    <a data-id="{{$dat->id}}" href="{{url('/product/'.$dat->prod_slug)}}" class="product_idwoocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <h2 class="woocommerce-loop-product__title">{{$dat->prod_name}}</h2>
                                    </a>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Được xếp hạng 5.00 5 sao"><span style="width:100%">Được xếp hạng <strong class="rating">5.00</strong> 5 sao</span></div><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count">1</span> đánh giá của khách hàng)</a>
                                    </div>
                                    <span class="price">
                                        @if(!empty($dat->prod_sale))
                                            <del>
                                                <span class="woocommerce-Price-amount amount">{{number_format($dat->prod_price, 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </del>
                                        @endif 
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">{{number_format($dat->prod_price-($dat->prod_price*$dat->prod_sale*0.01), 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                        </ins>
                                    </span>
                                    @if(!empty($prod->hot))
                                        <div class="devvn_is_featured">
                                            <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="" />
                                        </div>
                                    @endif
                                    @if(!empty($prod->installment))
                                        <div class="devvn_is_tragop">
                                            <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" /> 
                                            <a class="product_id" data-id="{{$dat->id}}" href="{{url('/product/'.$dat->prod_slug)}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @include('frontend.nav.aside_search_category')
            </div>
        </div>
    </div>
@endsection