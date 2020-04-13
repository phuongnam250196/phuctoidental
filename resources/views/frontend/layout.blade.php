<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - phuctoidental.com</title>
    <meta name="description" content="@yield('description')"/>
    <link rel="icon" href="{{url('/')}}/images/fabicon-3.png" sizes="192x192" />
    <link rel="canonical" href="@yield('url')" />
    <link rel="alternate" href="@yield('url')" hreflang="x-default" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="@yield('author')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:site_name" content="@yield('sitename')" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:type" content="website" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="550" />
    <meta name="twitter:description" content="@yield('description')" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:image" content="@yield('image')" />
    <meta name="twitter:url" content="@yield('url')" />
    <meta name="twitter:card" content="@yield('description')" />
    <meta name="twitter:site" content="{{$_SERVER['HTTP_HOST']}}" />


    <link rel='stylesheet' href='{{url("/vlnk")}}/css/styles.css' type='text/css' />
    <link rel='stylesheet' href='{{url("/vlnk")}}/css/setup_css.css' type='text/css' />
    <link rel='stylesheet' href='{{url("/vlnk")}}/css/devvn-quick-buy.css' type='text/css' />
    <link rel='stylesheet' href='{{url("/vlnk")}}/css/woocommerce-layout.css' type='text/css' />
    <link rel='stylesheet' href='{{url("/vlnk")}}/css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' href='{{url("/vlnk")}}/css/woocommerce.css' type='text/css' />
    <link rel='stylesheet' id='style-css' href='{{url("/vlnk")}}/css/devvn_style.css' type='text/css' />
    <link rel='stylesheet' id='respon-css' href='{{url("/vlnk")}}/css/respon.css' type='text/css' />
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
    <script type='text/javascript' src='{{url("/vlnk")}}/js/jquery.js'></script>
    <script type='text/javascript' src='{{url("/vlnk")}}/js/jquery-migrate.min.js'></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}
    {{-- <script type='text/javascript' src='{{url("/vlnk")}}/js/tcc_l.combined.1.0.6.min.js'></script> --}}
    <script>
        jQuery( document ).ready(function() {
    		jQuery('img[data-lazy-src]').each(function() 
    		{  
                var imgsrc = jQuery(this).attr("data-lazy-src");
                jQuery(this).attr('src',imgsrc);
            });    
            var tbay_bottom_header = jQuery('header.header');
            var CurrentScroll = 0;
            var tbay_width = jQuery(window).width();
            var header_height = tbay_bottom_header.height();
            jQuery(window).scroll(function() {
                if(tbay_width <= 767) {
    				//alert('ss');
                    var NextScroll = jQuery(this).scrollTop();
                    if (NextScroll > header_height + 30) {
                        tbay_bottom_header.addClass('sticky-header');
                    } else {
                        tbay_bottom_header.removeClass('sticky-header');  
                    }
                }
            });
        });
	
	</script>
    <style>
        /* #e03232 */
        .menu_header_wrap,  h3.title-sidebar, .devvn_mega_menu_title h2:before, .devvn_mega_menu_image h2:before, .cart_floating_right_button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .show_phone_mobile, .section_cvp_title h3, .section_cvp_title h2, .woocommerce span.onsale, .woocommerce ul.products li.product .onsale, .paginate_links .current, .paginate_links .page-numbers:hover, .nav-links a:hover, a.read_more:hover, .cart_after_content_title h2, a.checkout-button.button.alt.wc-forward, .woocommerce a.remove:hover, .cart_floating_right_title {
            background: {{infoOther()->color}};
        }
        .devvn_sub_mega_content, ul.devvn_sub_menu {
            border-left: 5px solid {{infoOther()->color}};
        }
        .search_header button#searchsubmit, .search_header button#searchsubmit:hover, form#searchform #searchsubmit:hover, .wpcf7-form-control.wpcf7-submit, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
            background: {{infoOther()->color}};
            border: 1px solid {{infoOther()->color}};
        }
        .scrollTo_top, .scrollTo_top:hover {
            background: {{infoOther()->color}} !important;
        }
        .textwidget span, .woocommerce a.remove {
            color: {{infoOther()->color}} !important;
        }
        .cart_after_content, .cart_floating_right_content {
            border: 1px solid {{infoOther()->color}};
        }
        .section_cvp_title {
            border-bottom: 2px solid {{infoOther()->color}};
        }
        .section_cvp_title h3:after {
            border-left: 30px solid {{infoOther()->color}};
        }
        .woocommerce ul.products li.product .price, .widget_recent_entries_svl ul li a:hover, .woocommerce ul.products li.product a:hover, .widget.block-sidebar > ul li a:hover, h1.title-page, h2.post-title a:hover, ul.news_list li a:hover, .widget > ul li a:hover, .relatedcat a:hover, a.cart-contents:hover, .tinymce a, ul.devvn_mega_menu_ul > li:hover > a, .woocommerce div.product p.price, .woocommerce div.product span.price, .chinhsach_content strong, .contact-detail ul li span, .related.products h2, .up-sells.upsells.products h2, .product_meta .sku, .product_meta a, .cart_totals h2, div#customer_details h3, h3#order_review_heading {
            color: {{infoOther()->color}};
        }
        div#reviews div#comments {
            border-bottom: 1px solid {{infoOther()->color}};
        }
        h1.page-title {
            color: {{infoOther()->color}};
            border-bottom: 2px solid {{infoOther()->color}};
        }
        .woocommerce-info {
            border-top-color: {{infoOther()->color}};
        }
    </style>
</head>

<body class="home woocommerce">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
    <header class="header">
        <div class="top_header">
            <div class="container">
                <div class="top_header_left"><i class="fa fa-envelope-open" aria-hidden="true"></i> {{infoOther()->email}}</div>
                <div class="top_header_middle"><i class="fa fa-phone-square" aria-hidden="true"></i> {{chunk_split(infoOther()->phone, 4, '.')}}</div>
                <div class="top_header_right"><i class="fa fa-facebook-official" aria-hidden="true"></i> fb.com/phuongnam</div>
            </div>
        </div>
        <div class="main_header">
            <div class="container">
                <h2 hidden="">Danh sách vật liệu giá rẻ</h2>
                <p class="logo">
                    <a href="{{url('/')}}" title="@yield('title')"><img src="{{url('/'.infoOther()->logo)}}" alt="@yield('title')" title="@yield('title')" /></a>
                </p>
                <div class="search_header">
                    <form  method="get" class="woocommerce-product-search" action="{{url('search')}}">
                        <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Tìm kiếm sản phẩm" name="keyword" value="@if(!empty($_GET['keyword'])) {{$_GET['keyword']}} @endif" title="Tìm kiếm:" />
                        <button type="submit" class="btn btn-default" id="searchsubmit">Tìm kiếm</button>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="cart_header woocommerce">
                    <div class="popup_cart_hover">
                        <a class="cart-contents" href="{{url('cart')}}" title="Hiển thị giỏ hàng">
                            <span>Giỏ hàng của bạn</span>
                            <small>Có <strong id="pr_count">0</strong> sản phẩm</small>
                        </a>
                        <div class="popup_cart">
                            <ul id="cart_id_none" class="cart_list product_list_widget">
                                {{-- <li class="empty">Chưa có sản phẩm trong giỏ hàng.</li> --}}
                            </ul><!-- end product list -->
                            <input style="display: none;" type="text" id="user_id" @if(!empty(Cookie::get('email'))) value="{{show_info_email()->id}}" @else value="" @endif>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu_header_wrap">
            <div class="container">
                <div class="danhmuc_sanpham_menu">
                    <h3 class="title-sidebar click_open_mega">Danh mục sản phẩm<i class="fa fa-bars"></i></h3>
                    <div class="devvn_mega_menu_wrap">
                        @include('frontend.nav.nav_cate')
                    </div>
                </div>
                <a href="#" class="button_open_menu"><i class="fa fa-bars"></i> Menu</a>
                <nav class="menu_header">
                    <ul id="menu-main-menu" class="menu">
                        <li class="menu-item @if(Request::is('/')) current_page_ancestor @endif"><a href="{{url('/')}}" title="@yield('title')">Trang chủ</a>
                        </li>
                        <li class="menu-item @if(Request::is('news') || Request::is('news/*')) current_page_ancestor @endif"><a href="{{url('/news')}}" title="Tin tức">Tin tức</a>
                            <ul class="sub-menu">
                                @foreach(listCatePost() as $key=>$cate)
                                    <li class="menu-item"><a class="category_id" data-id="{{$cate->id}}" href="{{url('/news/category/'.$cate->cate_slug)}}" title="{{$cate->cate_name}}">{{$cate->cate_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item @if(Request::is('videos') || Request::is('videos/*')) current_page_ancestor @endif"><a href="{{url('/videos')}}" title="Videos">Videos</a>
                            <ul class="sub-menu">
                                @foreach(listCateVideo() as $key=>$cate)
                                    <li class="menu-item"><a class="category_id" data-id="{{$cate->id}}" href="{{url('/videos/category/'.$cate->cate_slug)}}" title="{{$cate->cate_name}}">{{$cate->cate_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item @if(Request::is('support') || Request::is('support/*')) current_page_ancestor @endif"><a href="{{url('/support')}}" title="Hỗ trợ khách hàng">Hỗ trợ khách hàng</a></li>
                        <li class="menu-item @if(Request::is('agency') || Request::is('agency/*')) current_page_ancestor @endif"><a href="{{url('/agency')}}" title="Hệ thống đại lý">Hệ thống đại lý</a></li>
                        <li class="menu-item @if(Request::is('contact') || Request::is('contact/*')) current_page_ancestor @endif"><a href="{{url('/contact')}}" title="Liên hệ">Liên hệ</a></li>
                        <li class="menu-item @if(Request::is('login') || Request::is('login/*')) current_page_ancestor @endif">
                            @if(empty(Cookie::get('email')))
                                <a href="{{url('/login')}}" title="Tài khoản">Tài khoản</a>
                            @else
                                <a href="{{url('account')}}" title="Tài khoản">{{Cookie::get('email')}}</a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="end_navpage"></div>
    </header>
    

    <!-- Thay đổi ở đây -->
    @yield('main')
    <!-- End thay đổi ở đây -->

    <footer class="footer">
        <div class="container">
            <div class="row footer_wrap">
                <div class="footer1 col-md-3 col-sm-3 col-xs-12">
                    <div id="text-2" class="widget-footer widget_text">
                        <h4 class="title-sidebar-footer">Thông tin liên hệ</h4>
                        <div class="textwidget">
                            <p><b><span class="text-uppercase" style="color: red">Vật liệu nha Khoa</span></b><br />
                                {{infoOther()->address}}<br />
                                Điện thoại: {{chunk_split(infoOther()->phone, 4, '.')}}<br />
                                Hotline: {{chunk_split(infoOther()->phone, 4, '.')}}<br />
                                <b><span style="color: red">EMAIL<b></b></span><b><br />
                                        {{infoOther()->email}}</b></b></p>
                        </div>
                    </div>
                    <div id="text-5" class="widget-footer widget_text">
                        <h4 class="title-sidebar-footer">Theo dõi SHOP</h4>
                        <div class="textwidget">
                            <ul class="list-socials">
                                <li><a href="{{infoOther()->fanpage_id}}" target="_blank" title="fanpage facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{infoOther()->twitter_id}}" target="_blank" title="fanpage twitter"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="{{infoOther()->skype_id}}" target="_blank" title="fanpage youtube"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer2 col-md-3 col-sm-3 col-xs-12">
                    <div id="nav_menu-2" class="widget-footer widget_nav_menu">
                        <h4 class="title-sidebar-footer">Trợ giúp</h4>
                        <div class="menu-menu-tro-giup-container">
                            <ul id="menu-menu-tro-giup" class="menu">
                                <li class="menu-item @if(Request::is('/')) current_page_ancestor @endif">
                                    <a href="{{url('/')}}" title="@yield('title')">Trang chủ</a>
                                </li>
                                <li class="menu-item @if(Request::is('news') || Request::is('news/*')) current_page_ancestor @endif">
                                    <a href="{{url('/news')}}" title="Tin tức">Tin tức</a>
                                    <ul class="sub-menu">
                                        @foreach(listCatePost() as $key=>$cate)
                                            <li class="menu-item"><a class="category_id" data-id="{{$cate->id}}" href="{{url('/news/category/'.$cate->cate_slug)}}" title="{{$cate->cate_name}}">{{$cate->cate_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item @if(Request::is('videos') || Request::is('videos/*')) current_page_ancestor @endif">
                                    <a href="{{url('/videos')}}" title="Videos">Videos</a>
                                    <ul class="sub-menu">
                                        @foreach(listCateVideo() as $key=>$cate)
                                            <li class="menu-item"><a class="category_id" data-id="{{$cate->id}}" href="{{url('/videos/category/'.$cate->cate_slug)}}" title="{{$cate->cate_name}}">{{$cate->cate_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item @if(Request::is('support') || Request::is('support/*')) current_page_ancestor @endif"><a href="{{url('/support')}}" title="Hỗ trợ khách hàng">Hỗ trợ khách hàng</a></li>
                                <li class="menu-item @if(Request::is('agency') || Request::is('agency/*')) current_page_ancestor @endif"><a href="{{url('/agency')}}" title="Hệ thống đại lý">Hệ thống đại lý</a></li>
                                <li class="menu-item @if(Request::is('contact') || Request::is('contact/*')) current_page_ancestor @endif"><a href="{{url('/contact')}}" title="Liên hệ">Liên hệ</a></li>
                                <li class="menu-item @if(Request::is('login') || Request::is('login/*')) current_page_ancestor @endif">
                                    @if(empty(Cookie::get('email')))
                                        <a href="{{url('/login')}}" title="Tài khoản">Tài khoản</a>
                                    @else
                                        <a href="{{url('account')}}" title="Tài khoản">{{Cookie::get('email')}}</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer3 col-md-3 col-sm-3 col-xs-12">
                    <div id="text-4" class="widget-footer widget_text">
                        <h4 class="title-sidebar-footer">Facebook</h4>
                        <div class="textwidget">
                            <div class="fb-page" data-href="https://www.facebook.com/covekila" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote class="fb-xfbml-parse-ignore" cite="https://www.facebook.com/covekila">
                                    <p><a href="https://www.facebook.com/covekila" title="fanpage facebook">Levantoi.vn</a></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer4 col-md-3 col-sm-3 col-xs-12">
                    <div id="text-6" class="widget-footer widget_text">
                        <h4 class="title-sidebar-footer">Bản đồ</h4>
                        <div class="textwidget">
                            <div class="full_mobile"><a href="#" target="_blank" title="Bản đồ {{$_SERVER['HTTP_HOST']}}"><img src="{{url('/vlnk')}}/images/maps.png" alt="Bản đồ {{$_SERVER['HTTP_HOST']}}" title="Bản đồ {{$_SERVER['HTTP_HOST']}}" /></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_tags">
                <div id="woocommerce_product_tag_cloud-2" class="widget-footer woocommerce widget_product_tag_cloud">
                    <h4 class="title-sidebar-footer">Từ khóa thông dụng</h4>
                    <div class="tagcloud">
                        @foreach(listCate() as $key=>$cate)
                    	   <a class="category_id" data-id="{{$cate->id}}" href="{{url('/category/'.$cate->cate_slug)}}" class="tag-cloud-link" style="font-size: 22pt;" title="{{$cate->cate_name}}">{{$cate->cate_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="footer_copyright">
                <div class="footer_copyright_left">{{infoOther()->footer_content}}</div>
            </div>
        </div>
    </footer>


    {{-- pop đơn hàng --}}
    <div id="fancybox_id" class="fancybox-overlay fancybox-overlay-fixed">
        <div class="fancybox-wrap fancybox-desktop fancybox-type-html fancybox-opened" tabindex="-1">
            <div class="fancybox-skin">
                <div class="fancybox-outer">
                    <div class="fancybox-inner">
                        <div id="devvn-wacp-popup">
                            <div class="devvn-wacp-wrapper woocommerce">
                                <div class="devvn-wacp-main">
                                    <div class="devvn-wacp-content">
                                        <h2>1 Sản phẩm đã được thêm vào giỏ hàng.</h2>
                                        <div class="info-box">
                                            <div class="product-thumb">
                                                
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-title product-title-popup">
                                                    
                                                </h3>
                                                <span class="product-price">
                                                    <del>
                                                        <span class="woocommerce-Price-amount amount" id="popup_cost"></span>
                                                    </del> 
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount" id="popup_cost_present"></span>
                                                    </ins> 
                                                </span>
                                            </div>
                                        </div>
                                        <div class="cart-info">
                                            <h3>Giỏ hàng của bạn</h3>
                                            <div class="cart-totals">
                                                Tổng: <span class="cart-cost">
                                                    <span class="woocommerce-Price-amount amount" id="total_cost_popup"></span> </span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="text-right button_popup_cart">
                                            <a href="javascript:;" class="tat_popup" id="button_muathemsanpham">Mua thêm sản phẩm</a>
                                            <a href="{{url('pay')}}" id="button_dathang_thanhtoan">Đặt hàng và thanh toán</a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="woocommmerce devvn-wacp-related">
                                            <h3>Một số sản phẩm có thể bạn quan tâm</h3>
                                            <ul class="products columns-4">
                                                @foreach(listProducts() as $key=>$prod)
                                                @if($key<4)
                                                    <li class="product" style="height: inherit;">
                                                        <div class="shop_loop_box">
                                                            <a data-id="{{$prod->id}}" href="{{url('product/'.$prod->prod_slug)}}" class="product_id">
                                                                <span class="onsale">Giảm giá!</span>
                                                                <img src="{{url(''.$prod->prod_img)}}" alt="" />
                                                            </a>
                                                            <a data-price="{{$prod->prod_price_sale}}" data-product_id="{{$prod->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a>
                                                        </div>
                                                        <a data-id="{{$prod->id}}" href="{{url('product/'.$prod->prod_slug)}}" class="product_id">
                                                            <h2 class="woocommerce-loop-product__title">{{$prod->prod_name}}</h2>
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
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <style>
        #fancybox_id {
            width: auto; 
            height: auto; 
            display: none;
        }
        .fancybox-wrap {
            width: 850px; 
            height: 100%; 
            position: absolute; 
            left: 266px;
            top: 24px; 
            padding: 0;
            opacity: 1; 
            overflow: visible;
        }
        div#devvn-wacp-popup {
            background: #fff;
            padding: 10px;
            width: 100%;
            max-width: 900px;
        }
        .devvn-wacp-content h2 {
            font-size: 18px;
            margin: 0 0 10px;
            font-weight: 700;
            color: #e03232;
        }
        div#devvn-wacp-popup .info-box {
            overflow: hidden;
            float: left;
            padding-right: 230px;
            width: 100%;
        }
        .devvn-wacp-content {
            position: relative;
        }
        div#devvn-wacp-popup .cart-info {
            float: right;
            width: 220px;
            padding: 15px 10px 10px 10px;
            border: 1px solid #ccc;
            position: absolute;
            line-height: 22px;
            background: #fff;
            right: 0;
            top: 50px;
        }
        div#devvn-wacp-popup .product-thumb {
            float: left;
            width: 110px;
            margin: 0 20px 0 0;
        }
        div#devvn-wacp-popup .product-info {
            padding-top: 20px;
        }
        div#devvn-wacp-popup .cart-info h3 {
            font-size: 15px;
            font-weight: 700;
            margin: 0;
            background: #fff;
            padding: 5px;
            position: absolute;
            top: -15px;
        }
        div#devvn-wacp-popup .cart-info span.shipping-cost,
        div#devvn-wacp-popup .cart-info span.cart-cost {
            font-weight: 700;
            color: #e03232;
        }
        div#devvn-wacp-popup .info-box .product-info h3 {
            margin: 0 0 10px;
            font-size: 18px;
            font-weight: 700;
        }
        div#devvn-wacp-popup .info-box .product-info span.product-price {
            color: #e03232;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
        }
        div#devvn-wacp-popup .info-box .product-info span.product-price del {
            opacity: 1;
            display: inline-block;
            color: #898989;
            font-weight: 400;
            font-size: 14px;
        }
        div#devvn-wacp-popup .info-box .product-info span.product-price ins {
            background: 0 0;
            font-weight: 700;
            text-decoration: none;
            font-size: 16px;
        }
        .button_popup_cart a {
            display: inline-block;
            background: #e03232;
            color: #fff;
            padding: 6px 18px;
            border-radius: 15px;
            margin: 0 4px;
            text-decoration: none;
        }
        .button_popup_cart a:hover {
            background: #6d6d6d;
        }
        .devvn-wacp-related > h3 {
            font-size: 18px;
            font-weight: 700;
            color: #e03232;
        }
        @media (max-width: 1199px){
            .fancybox-wrap {
                width: 100%; 
                height: 100%; 
                position: absolute; 
                top: 24px; 
                left: 0;
                padding: 0 50px;
                opacity: 1; 
                overflow: visible;
            }
        }
        @media (max-width: 767px){
            .fancybox-wrap {
                width: 100%; 
                height: 100%; 
                padding: 20px;
                overflow-x: scroll;
            }
            div#devvn-wacp-popup .info-box {
                padding-right: 0;
            }
            div#devvn-wacp-popup .cart-info {
                position: relative;
                width: 100%;
                top: 0;
                margin: 15px 0;
            }   
        }
        @media (max-width: 399px){  
            .devvn-wacp-content h2 {
                font-size: 14px;
                line-height: 20px;
            }
            div#devvn-wacp-popup .info-box .product-info h3 {
                margin: 0 0 10px;
                font-size: 14px;
                font-weight: 400;
                line-height: 20px;
            }
            div#devvn-wacp-popup .product-info {
                padding-top: 0;
            }
            .button_popup_cart a {
                margin: 0 auto 5px;
                width: 100%;
            }
            .text-right {
                text-align: center;
            }
        }
    </style>
    {{-- End popup đơn hàng --}}


    <div class="box_overlay"></div>
    <!-- Start Quick Buttons By https://muatheme.com -->
    <div class='quick-call-button'></div>
    <div class="show_phone_mobile"><a href="tel:{{infoOther()->phone}}" title="Gọi ngay"><i class="fa  fa-phone"></i> {{phoneNumber(infoOther()->phone)}}</a></div>
    <link rel='stylesheet' href='{{url("/vlnk")}}/css/quick-call-button.css?ver=1.0.3' type='text/css' />
    <script type='text/javascript' src='{{url("/vlnk")}}/js/scripts.js'></script>
    <script type='text/javascript' src='{{url("/vlnk")}}/js/jquery.validate.min.js'></script>
    <script type='text/javascript' src='{{url("/vlnk")}}/js/jquery.bpopup.min.js'></script>
    <script type='text/javascript' src='{{url("/vlnk")}}/js/devvn-quick-buy.js'></script>
    <script type='text/javascript' src='{{url("/vlnk")}}/js/devvn_main.js'></script>
    <script type='text/javascript' src='{{url("/vlnk")}}/js/add-cart-myscript.js'></script>
    <script src="{{url('/pike')}}/assets/js/sweetalert.min.js"></script>
    {{-- <script type='text/javascript' src='{{url("/vlnk")}}/js/js.cookie.min.js'></script> --}}
    {{-- <script type='text/javascript' src='{{url("/vlnk")}}/js/woocommerce.min.js'></script> --}}
    {{-- <script type='text/javascript' src='{{url("/vlnk")}}/js/drag-quick-call-button.js'></script> --}}
    <a title="Lên đầu trang" href="#" class="scrollTo_top"><i class="fa fa-arrow-up"></i></a>
    <div class="cart_floating_right">
        <div class="cart_floating_right_button"><strong><i class="fa fa-shopping-basket"></i> Giỏ hàng</strong></div>
        <div class="cart_floating_right_content">
            <div class="cart_floating_right_title">
                <span><i class="fa fa-shopping-basket"></i> Giỏ hàng của bạn</span>
                <span><i class="fa fa-sign-out"></i> Thu nhỏ</span>
            </div>
            <div class="cart_floating_right_minicart woocommerce">
                <div class="floating_popup_cart">
                    <div class="mini-cart-body">
                        <ul class="cart_list product_list_widget" id="list_cart_right">
                        </ul><!-- end product list -->
                        <p class="total"><strong>Tạm tính:</strong> <span class="woocommerce-Price-amount amount"><span class="total_price"></span>&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></p>
                        <p class="buttons">
                            <a href="{{url('cart')}}" class="button wc-forward" id="button_xemgiohang">Giỏ hàng</a>
                            <a href="{{url('pay')}}" class="button checkout wc-forward" id="button_thanhtoan">Thanh toán</a>
                        </p>
                    </div>
                </div>
            </div> 
        </div>
    </div>
  
    <script>
	    (function($) {
	        $(document).ready(function() {
	            $('.cart_floating_right_button').click(function() {
	                $('.cart_floating_right').addClass('open_float_cart');
	            });
	            $('.cart_floating_right_title').click(function() {
	                $('.cart_floating_right').removeClass('open_float_cart');
	            });
	        });
	    })(jQuery);
    </script>
    <script>
        (function($) {
            $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10);   
                $(this).parent().children('li.star').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }
                    else {
                        $(this).removeClass('hover');
                    }
                });
            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
            });
          
            $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');    
                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }
                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }
                
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                for(i=1;i<6;i++) {
                    if(ratingValue == i) {
                        $('#rating option[value='+i+']').attr('selected', 'selected');
                    } else {
                        $('#rating option[value='+i+']').removeAttr('selected');
                    }
                }
            });  
        })(jQuery);
    </script>
    
    
</body>

</html>