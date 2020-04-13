@extends('frontend.layout')
@section('title', 'Sản phẩm theo loại')
@section('description', 'Bạn đang xem danh sách sản phẩm theo danh mục: '.$cate->cate_name)
@section('image', url('/'.infoOther()->logo))
@section('url', url('/category/'.$cate->cate_slug))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', $cate->cate_name)
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;/&nbsp;{{$cate->cate_name}}</nav>
                        <h2 class="page-title">{{$cate->cate_name}}</h2>
                        <div class="term-description">
                            <p>Mua {{$cate->cate_name}} chính hãng tại TECH360 để nhận được nhiều ưu đãi, khuyến mại, quà tặng hấp dẫn, tặng ngay tài khoản VIP, bộ ứng dụng giải trí cao cấp</p>
                        </div>
                        <div class="woocommerce-notices-wrapper"></div>
                        <p class="woocommerce-result-count">
                            Hiển thị {{!empty($_GET['page'])?$_GET['page']:1}}–{{!empty($_GET['page'])?$_GET['page']*24:24}} của {{count($data)}} sản phẩm</p>
                        <div class="woocommerce-ordering">
                            <select name="orderby" class="orderby" onchange="location = this.value;">
                                <option value="{{url('/category/'.$cate->cate_slug)}}" @if(empty($_GET['type'])) selected @endif>Thứ tự mặc định</option>
                                <option value="{{url('/category/'.$cate->cate_slug.'?type=view')}}" @if(!empty($_GET['type']) && $_GET['type']=='view') selected @endif>Thứ tự theo lượt xem nhiều nhất</option>
                                <option value="{{url('/category/'.$cate->cate_slug.'?type=review')}}" @if(!empty($_GET['type']) && $_GET['type']=='review') selected @endif>Thứ tự theo điểm đánh giá cao nhất</option>
                                <option value="{{url('/category/'.$cate->cate_slug.'?type=new')}}" @if(!empty($_GET['type']) && $_GET['type']=='new') selected @endif>Mới nhất</option>
                                <option value="{{url('/category/'.$cate->cate_slug.'?type=price')}}" @if(!empty($_GET['type']) && $_GET['type']=='price') selected @endif>Thứ tự theo giá: thấp đến cao</option>
                                <option value="{{url('/category/'.$cate->cate_slug.'?type=price-desc')}}" @if(!empty($_GET['type']) && $_GET['type']=='price-desc') selected @endif>Thứ tự theo giá: cao xuống thấp</option>
                            </select>
                        </div>
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
                                        <a data-price="{{$dat->prod_price_sale}}" data-product_id="{{$dat->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a> 
                                    </div>
                                    <a data-id="{{$dat->id}}" href="{{url('/product/'.$dat->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <h2 class="woocommerce-loop-product__title">{{$dat->prod_name}}</h2>
                                    </a>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Được xếp hạng 5.00 5 sao"><span style="width:100%">Được xếp hạng <strong class="rating">5.00</strong> 5 sao</span></div><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count">@if(!empty($dat->views)){{$dat->views->count}}@else 0 @endif</span> đánh giá của khách hàng)</a>
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
                                    @if(!empty($dat->hot))
                                        <div class="devvn_is_featured">
                                            <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="" />
                                        </div>
                                    @endif
                                    @if(!empty($dat->installment))
                                        <div class="devvn_is_tragop">
                                            <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" /> 
                                            <a class="product_id" data-id="{{$dat->id}}" href="{{url('/product/'.$dat->prod_slug)}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <nav class="woocommerce-pagination">
                            {{$data->links('vendor.pagination.simple-search')}}
                        </nav>
                        <div class="section_html tinymce">
                            <h1><span style="font-size: 14pt;"><strong>Phuctoidental phân phối {{$cate->cate_name}} tại Hà Nội, tp HCM và Toàn quốc</strong></span></h1>
                            <p><a class="category_id" data-id="{{$cate->id}}" href="{{url('/category/'.$cate->cate_slug)}}"><b>{{$cate->cate_name}}</b></a> đơn giản là một thiết bị kỹ thuật số trang bị hệ điều hành Android và được kết nối với Tivi của bạn, hỗ trợ các chức năng giải trí như xem truyền hình trực tuyến, xem phim online, offline, nghe nhạc, lướt web đọc báo, xem video youtube, xem bóng đá, tham gia mạng xã hội, chat skype, chơi game… cũng như sử dụng nhiều ứng dụng android khác qua mạng Internet. {{$cate->cate_name}} thường kết nối với TV qua cổng HDMI hay AV, do vậy hầu hết tất cả các loại TV đều có thể sử dụng với {{$cate->cate_name}}.</p>
                            <p>Liên hệ với <strong>Phuctoidental</strong> để được tư vấn miễn phí và chọn mua được mẫu TV Box phù hợp nhu cầu sử dụng với giá tốt nhất!</p>
                        </div>
                    </div>
                </div>
                @include('frontend.nav.aside_search_category')
            </div>
        </div>
    </div>
@endsection