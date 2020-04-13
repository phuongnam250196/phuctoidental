@extends('frontend.layout')
@section('title', $seopost->title)
@section('description'){!!substr($seopost->description, 0, 160)!!}@endsection
@section('image', url('/'.$seopost->image))
@section('url', $seopost->url)
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', $seopost->keyword)
@section('author', $seopost->author)
@section('main')
    <h1 hidden="">{{$seopost->title}}</h1>
    <h2 hidden="">{{$seopost->title}}</h2>
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div class="slider_section">
                        <ul class="bxslider">
                            @foreach($sliders as $key=>$slider)
                                <li @if($key !=0) class="hiddenFirst" @endif>
                                    <a href="{{$slider->link}}" title="{{$slider->title}}" target="_self"> <img width="855" height="260" src="{{url('/'.$slider->image)}}" class="attachment-full size-full" alt="{{$slider->title}}" title="{{$slider->title}}" /> </a> 
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <section class="section_custom_view_products ">
                        <div class="section_cvp_title">
                            <h3><span id="jj">Sản phẩm khuyến mại</span></h3>
                        </div>
                        <div class="section_cvp_content">
                            <div class="woocommerce columns-4 ">
                                <ul class="products columns-4">
                                    @foreach($products as $key=>$prod)
                                    @if($key<8)
                                        <li class="product">
                                            <div class="shop_loop_box">
                                                <a class="product_id" data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" title="{{$prod->prod_name}}">
                                                    @if(!empty($prod->prod_sale))
                                                        <span class="onsale">Giảm giá!</span>
                                                    @endif
                                                    <img src="{{url('/'.$prod->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{$prod->prod_name}}" title="{{$prod->prod_name}}" />
                                                    {{-- <img src="" alt="" style="background: transparent url('{{url('/'.$prod->prod_img)}}') no-repeat;height:165px;background-position: center;no-repeat;background-size: cover;"  title="{{$prod->prod_name}}"> --}}
                                                </a>
                                                <a data-price="{{$prod->prod_price_sale}}" data-product_id="{{$prod->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a>
                                            </div>
                                            <a class="product_id" data-id="{{$prod->id}}"  href="{{url('/product/'.$prod->prod_slug)}}" alt="{{$prod->prod_name}}" title="{{$prod->prod_name}}">
                                                <h4 class="woocommerce-loop-product__title">{{$prod->prod_name}}</h4>
                                            </a>
                                            <span class="price">
                                                @if(!empty($prod->prod_sale))
                                                    <del>
                                                        <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price, 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </del>
                                                @endif 
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price-($prod->prod_price*$prod->prod_sale*0.01), 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </ins>
                                            </span>
                                            @if(!empty($prod->hot))
                                                <div class="devvn_is_featured">
                                                    <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="Sản phẩm hot" title="Sản phẩm hot" />
                                                </div>
                                            @endif
                                            @if(!empty($prod->installment))
                                                <div class="devvn_is_tragop">
                                                    <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" title="Trả góp" alt="Trả góp" /> 
                                                    <a class="product_id" data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" title="{{$prod->prod_name}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                </div>
                                            @endif
                                        </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                   
                    <div class="section_oneimage">
                        <a href="#" title="" target="_blank"> <img width="912" height="75" src="{{url('/vlnk')}}/images/home_07.png" class="attachment-full size-full" title="Vì sao mua hàng ở chúng tôi" alt="Vì sao mua hàng ở chúng tôi" /> </a>
                    </div>
                    <section class="section_custom_view_products ">
                        <div class="section_cvp_title">
                            <h3><span>Sản phẩm nổi bật</span></h3>
                        </div>
                        <div class="section_cvp_content">
                            <div class="woocommerce columns-4 ">
                                <ul class="products columns-4">
                                    @foreach($products as $key=>$prod)
                                    @if($key<4)
                                        <li class="product">
                                            <div class="shop_loop_box">
                                                <a data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link" title="{{$prod->prod_name}}">
                                                    @if(!empty($prod->prod_sale))
                                                        <span class="onsale">Giảm giá!</span>
                                                    @endif
                                                    <img src="{{url('/'.$prod->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{$prod->prod_name}}" title="{{$prod->prod_name}}" />
                                                </a>
                                                <a data-price="{{$prod->prod_price_sale}}" data-product_id="{{$prod->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a>
                                            </div>
                                            <a data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link" title="{{$prod->prod_name}}">
                                                <h4 class="woocommerce-loop-product__title">{{$prod->prod_name}}</h4>
                                            </a>
                                            <span class="price">
                                                <del>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price, 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </del> 
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price-($prod->prod_price*$prod->prod_sale*0.01), 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </ins>
                                            </span>
                                            @if(!empty($prod->hot))
                                                <div class="devvn_is_featured">
                                                    <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="Sản phẩm hot" title="Sản phẩm hot" />
                                                </div>
                                            @endif
                                            @if(!empty($prod->installment))
                                                <div class="devvn_is_tragop">
                                                    <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" alt="Trả góp" title="Trả góp" /> 
                                                    <a class="product_id" data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" title="{{$prod->prod_name}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                </div>
                                            @endif
                                        </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                    <div class="section_custom_view_products ">
                        <div class="section_cvp_title">
                            <h3><span>Android Box</span></h3>
                            <a href="#" class="section_cvp_link" title="Xem thêm Android Box">Xem thêm</a>
                        </div>
                        <div class="section_cvp_content">
                            <div class="woocommerce columns-4 ">
                                <ul class="products columns-4">
                                    @foreach($products as $key=>$prod)
                                    @if($key<4)
                                        <li class="product">
                                            <div class="shop_loop_box">
                                                <a data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link" title="{{$prod->prod_name}}">
                                                    @if(!empty($prod->prod_sale))
                                                        <span class="onsale">Giảm giá!</span>
                                                    @endif
                                                    <img src="{{url('/'.$prod->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{$prod->prod_name}}" title="{{$prod->prod_name}}" />
                                                </a>
                                                <a data-price="{{$prod->prod_price_sale}}" data-product_id="{{$prod->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a>
                                            </div>
                                            <a data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link" title="{{$prod->prod_name}}">
                                                <h4 class="woocommerce-loop-product__title">{{$prod->prod_name}}</h4>
                                            </a>
                                            <span class="price">
                                                <del>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price, 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </del> 
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price-($prod->prod_price*$prod->prod_sale*0.01), 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </ins>
                                            </span>
                                            @if(!empty($prod->hot))
                                                <div class="devvn_is_featured">
                                                    <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="Sản phẩm hot" title="Sản phẩm hot" />
                                                </div>
                                            @endif
                                            @if(!empty($prod->installment))
                                                <div class="devvn_is_tragop">
                                                    <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" title="Trả góp" alt="Trả góp" /> 
                                                    <a class="product_id" data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" title="{{$prod->prod_name}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                </div>
                                            @endif
                                        </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section_custom_view_products ">
                        <div class="section_cvp_title">
                            <h3><span>MÁY CHIẾU ANDROID</span></h3>
                            <a href="#" class="section_cvp_link" title="Xem thêm MÁY CHIẾU ANDROID">Xem thêm</a>
                        </div>
                        <div class="section_cvp_content">
                            <div class="woocommerce columns-4 ">
                                <ul class="products columns-4">
                                    @foreach($products as $key=>$prod)
                                    @if($key<4)
                                        <li class="product">
                                            <div class="shop_loop_box">
                                                <a data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link" title="{{$prod->prod_name}}">
                                                    @if(!empty($prod->prod_sale))
                                                        <span class="onsale">Giảm giá!</span>
                                                    @endif
                                                    <img src="{{url('/'.$prod->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{$prod->prod_name}}" title="{{$prod->prod_name}}" />
                                                </a>
                                                <a data-price="{{$prod->prod_price_sale}}" data-product_id="{{$prod->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a> 
                                            </div>
                                            <a data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link" title="{{$prod->prod_name}}">
                                                <h4 class="woocommerce-loop-product__title">{{$prod->prod_name}}</h4>
                                            </a>
                                            <span class="price">
                                                <del>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price, 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </del> 
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price-($prod->prod_price*$prod->prod_sale*0.01), 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </ins>
                                            </span>
                                            @if(!empty($prod->hot))
                                                <div class="devvn_is_featured">
                                                    <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="Sản phẩm hot" title="Sản phẩm hot" />
                                                </div>
                                            @endif
                                            @if(!empty($prod->installment))
                                                <div class="devvn_is_tragop">
                                                    <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" alt="Trả góp" title="Trả góp" /> 
                                                    <a class="product_id" data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}" title="{{$prod->prod_name}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                </div>
                                            @endif
                                        </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section_html tinymce">
                        <p><strong>TPN</strong> Xin chào mừng các bạn đến với website của chúng tôi, chúng tôi chuyên cung cấp những sản phẩm tốt nhất liên quan đến thiết bị, dụng cụ nha khoa. Ngoài cung cấp, chúng tôi cũng có các dịch vụ về sửa chữa, cũng như chính sách bảo hành, giao hàng an toàn trên toàn quốc... Đặc biệt, là khi vực Vĩnh Phúc, sẽ được ưu tiên khi dùng các mặt hàng của chúng tôi.</p>
                    </div>
                </div>
                <aside id="sidebar" class="sidebar col-md-3 col-sm-3 col-xs-12 col-sm-pull-9">
                    <div class="widget danhmuc_widget">
                        <h3 class="title-sidebar">Danh mục sản phẩm<i class="fa fa-bars"></i></h3>
                        <div class="devvn_mega_menu_wrap">
                            @include('frontend.nav.nav_cate')
                        </div>
                    </div>
                    <div id="recent-posts_svl-2" class="widget widget_recent_entries_svl">
                        <h4 class="title-sidebar">Tin tức mới</h4>
                        @include('frontend.nav.nav_news')
                    </div>
                    <div id="recent-videos-svl-2" class="widget widget_recent_entries_svl">
                        <h4 class="title-sidebar">Videos</h4>
                        @include('frontend.nav.nav_videos')
                    </div>
                    <div id="media_image-2" class="widget widget_media_image"><img width="224" height="366" src="{{url('/vlnk')}}/images/banner-xe-dien-1.jpg" title="Ảnh quảng cáo" alt="Ảnh quảng cáo" class="image  attachment-full size-full" alt="" style="max-width: 100%; height: auto;" /></div>
                </aside>
            </div>
        </div>
    </div>
@endsection