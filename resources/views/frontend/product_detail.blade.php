@extends('frontend.layout')
@section('title', $seopost->title)
@section('description', $seopost->description)
@section('image', url('/'.$seopost->image))
@section('url', $seopost->url)
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', $seopost->keyword)
@section('author', $seopost->author)
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div id="container" class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div id="content" role="main">
                        <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;&#47;&nbsp;{{$product->prod_name}}</nav>
                        <div id="product-90" class="product type-product status-publish has-post-thumbnail first instock sale featured shipping-taxable purchasable product-type-simple">
                            <div class="row row-padding-15">
                                <div class="col-md-9 col-sm-12 col-xs-12 product-left">
                                    <div class="img-product clearfix">
                                        @if(!empty($product->prod_sale))
                                            <span class="onsale">Giảm giá!</span>
                                        @endif
                                        <div class="{{url('/vlnk')}}/images">
                                            <div id="product_slider" class="owl-carousel">
                                                @foreach(explode('|',$product->prod_gallery) as $key=>$image)
                                                <div class="item">
                                                    <a href="{{url('/'.$image)}}" class="woocommerce-main-image zoom single-product-lightbox"><img width="600" height="600" src="{{url('/'.$image)}}" class="attachment-shop_single size-shop_single wp-post-image" /></a> 
                                                </div>
                                                @endforeach
                                            </div>
                                            <div id="product_thumbnails" class="owl-carousel">
                                                @foreach(explode('|',$product->prod_gallery) as $key=>$image)
                                                <div class="item" data-id="1">
                                                    <img width="100" height="100" src="{{url('/'.$image)}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" />
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="thiet-bi">
                                                <p><img class="alignnone size-full wp-image-66" src="{{url('/vlnk')}}/images/home_07.png" alt="" width="100%" /></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary entry-summary">
                                        <h1 class="product_title entry-title">{{$product->prod_name}}</h1>
                                        <p class="price">
                                            @if(!empty($product->prod_sale))
                                                    <del>
                                                        <span class="woocommerce-Price-amount amount">{{number_format($product->prod_price, 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </del>
                                                @endif 
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">{{number_format($product->prod_price-($product->prod_price*$product->prod_sale*0.01), 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </ins>
                                        </p>
                                        <div itemprop="description" class="tinymce">
                                            {!! $product->prod_short_description !!}
                                        </div>
                                        <form class="cart" method="post" enctype='multipart/form-data'>
                                            <div class="quantity">
                                                <label class="screen-reader-text" for="quantity_5c27315a7cba5">Số lượng</label>
                                                <input type="number" id="quantity_5c27315a7cba5" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="" />
                                            </div>
                                            <input type="hidden" name="add-to-cart" value="90" />
                                            <button type="submit" class="single_add_to_cart_button button alt" id="single_addtocart">Thêm vào giỏ</button>
                                            <a title="Hướng dẫn mua hàng" href="{{url('support')}}" class="button huong-dan-mua-hang"><i class="fa fa-reply" aria-hidden="true"></i> Hướng dẫn mua hàng</a>
                                        </form>
                                        <a href="javascript:void(0);" class="devvn_buy_now devvn_buy_now_style" data-id="90">
                                            <strong>Mua ngay</strong>
                                            <span>Gọi điện xác nhận và giao hàng tận nơi</span>
                                        </a>
                                        <div class="product_meta">
                                            <span class="sku_wrapper">Mã: <span class="sku">QF004 HD WIFI</span></span>
                                            <span class="posted_in">Danh mục: 
                                                @foreach(listCate() as $cate)
                                                    <a class="category_id" data-id="{{$cate->id}}" href="{{url('/category/'.$cate->cate_slug)}}" rel="tag">{{$cate->cate_name}}</a>,
                                                @endforeach
                                             </span>
                                        </div>
                                        <div class="contact-detail">
                                            <ul>
                                                <li><span class="fa fa-phone"></span><strong>{{phoneNumber(infoOther()->phone)}}</strong></li>
                                                <li><span class="fa fa-phone"></span><strong>0888.090.898</strong></li>
                                                <li><span class="fa fa-envelope"></span>{{infoOther()->email}}</li>
                                            </ul>
                                        </div>
                                        <ul class="social_list">
                                            <li class="facebook_like">
                                                <div class="fb-like" data-href="{{url('product/'.$product->prod_slug)}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                            </li>
                                            <li class="google_shared">
                                                <div class="g-plusone" data-size="medium"></div>
                                            </li>
                                        </ul>
                                    </div><!-- .summary -->
                                    <div class="row row-padding-0">
                                        <div class="col-md-12 col-sm-12 col-xs-12 product-infor-left">
                                            <div class="woocommerce-tabs wc-tabs-wrapper">
                                                <ul class="tabs wc-tabs">
                                                    <li class="description_tab">
                                                        <a href="#tab-description">Mô tả</a>
                                                    </li>
                                                </ul>
                                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description">
                                                    <div class="section_cvp_title margin-b-15">
                                                        <h2>Mô tả sản phẩm</h2>
                                                    </div>
                                                    <div class="tinymce">
                                                        {!! $product->prod_content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-padding-0">
                                       <div class="col-sm-12 col-xs-12 product-review-left">
                                            <div class="cart_after_content">
                                                <div class="cart_after_content_title">
                                                    <h2>Mua sản phẩm này</h2>
                                                </div>
                                                <div class="row row-padding-15">
                                                    <div class="col-xs-12">
                                                        <h3>{{$product->prod_name}}</h3>
                                                        <form class="cart" method="post" enctype='multipart/form-data'>
                                                            <div class="quantity">
                                                                <label class="screen-reader-text" for="quantity_5c27315a7eac9">Số lượng</label>
                                                                <input type="number" id="quantity_5c27315a7eac9" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="" />
                                                            </div>
                                                            <input type="hidden" name="add-to-cart" value="90" />
                                                            <button type="submit" class="single_add_to_cart_button button alt" id="single_addtocart">Thêm vào giỏ</button>
                                                            <a title="Hướng dẫn mua hàng" href="{{url('/support')}}" class="button huong-dan-mua-hang"><i class="fa fa-reply" aria-hidden="true"></i> Hướng dẫn mua hàng</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <section class="related products">
                                        <h2>Sản phẩm tương tự</h2>
                                        <ul class="products columns-4">
                                            @foreach(listProducts() as $key=>$prod)
                                            @if($key<4)
                                                <li class="product">
                                                <div class="shop_loop_box">
                                                    <a data-id="{{$prod->id}}" href="{{url('product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        @if(!empty($prod->prod_sale))
                                                            <span class="onsale">Giảm giá!</span>
                                                        @endif
                                                        <img src="{{url('/'.$prod->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" />
                                                    </a>
                                                    <a data-price="{{$prod->prod_price_sale}}" data-product_id="{{$prod->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a>
                                                </div>
                                                <a data-id="{{$prod->id}}" href="{{url('product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link">
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
                                                        <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="" />
                                                    </div>
                                                @endif
                                                @if(!empty($prod->installment))
                                                    <div class="devvn_is_tragop">
                                                        <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" /> 
                                                        <a class="product_id" data-id="{{$prod->id}}" href="{{url('/product/'.$prod->prod_slug)}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                    </div>
                                                @endif
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </section>
                                    <div class="row row-padding-15">
                                        <div class="col-xs-12 product-review-left">
                                            <div class="section_cvp_title margin-b-15">
                                                <h2>Đánh giá sản phẩm</h2>
                                            </div>
                                            <div id="reviews" class="woocommerce-Reviews">
                                                <div id="comments">
                                                    @if(!empty($comments))
                                                    <h2 class="woocommerce-Reviews-title">
                                                        {{count($comments)}} đánh giá cho <span>{{$product->prod_name}}</span> </h2>
                                                    <ol class="commentlist">
                                                        @foreach($comments as $key=>$comment)
                                                        <li class="review even thread-even">
                                                            <div class="comment_container">
                                                                <img alt="" src="{{url('vlnk/images/review_user.png')}}" class="avatar avatar-60 photo" height="60" width="60">
                                                                <div class="comment-text">
                                                                    <div class="star-rating">
                                                                        @for($i=0;$i<5;$i++)
                                                                            @if($i < $comment->star)
                                                                                <i class="fa fa-star" style="color:#FF912C;"></i>
                                                                            @else
                                                                                <i class="fa fa-star"></i>
                                                                            @endif
                                                                        @endfor
                                                                    </div>
                                                                    <p class="meta">
                                                                        <strong class="woocommerce-review__author">{{$comment->name}} </strong>
                                                                        <span class="woocommerce-review__dash">–</span> <time class="woocommerce-review__published-date" datetime="{{$comment->created_at}}">{{date_format($comment->created_at, 'd/m/Y')}}</time>
                                                                    </p>
                                                                    <div class="description">
                                                                        <p>{{$comment->content}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ol>
                                                    @endif
                                                </div>
                                                
                                                <div id="review_form_wrapper">
                                                    <div id="review_form">
                                                        <div id="respond" class="comment-respond">
                                                            <span id="reply-title" class="comment-reply-title">Thêm đánh giá</span>
                                                            <form action="{{url('/review/product')}}" method="post" id="commentform" class="comment-form">
                                                                <p class="comment-notes"><span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span> Các trường bắt buộc được đánh dấu <span class="required" aria-required="true">*</span></p>
                                                                <div class="comment-form-rating"><label for="rating">Đánh giá của bạn</label>
                                                                    <div class='rating-stars'>
                                                                        <ul id='stars'>
                                                                            <li class='star' title='Rất tệ' data-value='1'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='Không tệ' data-value='2'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='Trung bình' data-value='3'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='Tốt' data-value='4'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='Rất tốt' data-value='5'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                        </ul>
                                                                        @if($errors->has('star'))
                                                                            <p class="help text-danger">{{ $errors->first('star') }}</p>
                                                                        @endif
                                                                    </div>
                                                                    <style>
                                                                        .rating-stars ul {
                                                                            list-style-type:none;
                                                                            padding:0;
                                                                            -moz-user-select:none;
                                                                            -webkit-user-select:none;
                                                                        }
                                                                        .rating-stars ul > li.star {
                                                                            display:inline-block;
                                                                        }
                                                                        .rating-stars ul > li.star > i.fa {
                                                                            font-size:20px;
                                                                            color:#ccc;
                                                                        }
                                                                        .rating-stars ul > li.star.hover > i.fa {
                                                                          color:#FFCC36;
                                                                        }
                                                                        .rating-stars ul > li.star.selected > i.fa {
                                                                          color:#FF912C;
                                                                        }
                                                                    </style>
                                                                    <select name="star" id="rating" style="display: none;">
                                                                        <option value="">Xếp hạng…</option>
                                                                        <option value="5">Rất tốt</option>
                                                                        <option value="4">Tốt</option>
                                                                        <option value="3">Trung bình</option>
                                                                        <option value="2">Không tệ</option>
                                                                        <option value="1">Rất tệ</option>
                                                                    </select>
                                                                </div>
                                                                <p class="comment-form-comment">
                                                                    <label for="comment">Nhận xét của bạn&nbsp;<span class="required" aria-required="true">*</span></label>
                                                                    <textarea id="comment" name="content" cols="45" rows="8" required="" aria-required="true">{{old('content')}}</textarea>
                                                                    @if($errors->has('content'))
                                                                        <p class="help text-danger">{{ $errors->first('content') }}</p>
                                                                    @endif
                                                                </p>
                                                                <p class="comment-form-author">
                                                                    <label for="author">Tên&nbsp;<span class="required" aria-required="true">*</span></label> 
                                                                    <input id="author" name="name" type="text" value="{{old('name')}}" size="30" required="" aria-required="true">
                                                                    @if($errors->has('name'))
                                                                        <p class="help text-danger">{{ $errors->first('name') }}</p>
                                                                    @endif
                                                                </p>
                                                                <p class="comment-form-email">
                                                                    <label for="email">Email&nbsp;<span class="required" aria-required="true">*</span></label> 
                                                                    <input id="email" name="email" type="email" value="{{old('email')}}" size="30" required="" aria-required="true">
                                                                    @if($errors->has('email'))
                                                                        <p class="help text-danger">{{ $errors->first('email') }}</p>
                                                                    @endif
                                                                </p>
                                                                <p class="form-submit">
                                                                    <input type="submit" class="submit" id="submit" value="Gửi đi">
                                                                    <input type="hidden" name="prod_id" value="{{$product->id}}">
                                                                </p>
                                                                {{csrf_field()}}
                                                            </form>
                                                        </div><!-- #respond -->
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12 product-right">
                                    <h3 class="title-sidebar">Chính sách - Hỗ trợ</h3>
                                    <div class="chinh_sach_cua_shop">
                                        <ul>
                                            <li class="has-icon">
                                                <div class="chinhsach_icon"><img width="42" height="42" src="{{url('/vlnk')}}/images/icon-policy-1.png" class="attachment-full size-full" alt="" /></div>
                                                <div class="chinhsach_content">
                                                    <p>GIAO HÀNG TRÊN TOÀN QUỐC</p>
                                                </div>
                                            </li>
                                            <li class="has-icon">
                                                <div class="chinhsach_icon"><img width="42" height="42" src="{{url('/vlnk')}}/images/icon-policy-2.png" class="attachment-full size-full" alt="" /></div>
                                                <div class="chinhsach_content">
                                                    <p>ĐỔI TRẢ TRONG 15 NGÀY NẾU LỖI KỸ THUẬT</p>
                                                </div>
                                            </li>
                                            <li class="has-icon">
                                                <div class="chinhsach_icon"><img width="42" height="42" src="{{url('/vlnk')}}/images/icon-policy-3.png" class="attachment-full size-full" alt="" /></div>
                                                <div class="chinhsach_content">
                                                    <p>THANH TOÁN TẠI NHÀ HOẶC QUA THẺ</p>
                                                </div>
                                            </li>
                                            <li class="has-icon">
                                                <div class="chinhsach_icon"><img width="42" height="42" src="{{url('/vlnk')}}/images/icon-policy-4.png" class="attachment-full size-full" alt="" /></div>
                                                <div class="chinhsach_content">
                                                    <p>TỔNG CSKH 8H30 - 18H00<br />
                                                        <strong>1900 0120</strong></p>
                                                </div>
                                            </li>
                                            <li class="has-icon">
                                                <div class="chinhsach_icon"><img width="42" height="42" src="{{url('/vlnk')}}/images/icon-policy-4.png" class="attachment-full size-full" alt="" /></div>
                                                <div class="chinhsach_content">
                                                    <p>KINH DOANH<br />
                                                        <strong>012.5222.5111</strong><br />
                                                        <strong>0888.090.898</strong></p>
                                                </div>
                                            </li>
                                            <li class="has-icon">
                                                <div class="chinhsach_icon"><img width="42" height="42" src="{{url('/vlnk')}}/images/icon-policy-4.png" class="attachment-full size-full" alt="" /></div>
                                                <div class="chinhsach_content">
                                                    <p>KỸ THUẬT<br />
                                                        <strong>012.5222.5111</strong></p>
                                                </div>
                                            </li>
                                            <li class="has-icon">
                                                <div class="chinhsach_icon"><img width="42" height="42" src="{{url('/vlnk')}}/images/icon-policy-5.png" class="attachment-full size-full" alt="" /></div>
                                                <div class="chinhsach_content">
                                                    <p>LẮP ĐẶT TẠI CÁC THÀNH PHỐ LỚN</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <div id="categories-4" class="widget widget_categories">
                                        <h3 class="title-sidebar">Danh mục tin tức</h3>
                                        <ul>
                                            @foreach(listCate() as $key=>$cate)
                                            @if($key < 7)
                                                <li class="cat-item">
                                                    <a class="category_id" data-id="{{$cate->id}}" href="{{url('/category/'.$cate->cate_slug)}}">{{$cate->cate_name}}</a> ({{count($cate->products)}})
                                                </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="newsnoibat_widget-2" class="widget newsnoibat_widget">
                                        <h3 class="title-sidebar">Tin tức nổi bật</h3>
                                        <div class="tintuc_lienquan">
                                            <ul class="news_list">
                                                @foreach(listPosts() as $key=>$post)
                                                @if($key<5)
                                                    <li class="has-thumbnail">
                                                        <a class="news_id" data-id="{{$post->id}}" href="{{url('/news/'.$post->post_slug)}}">
                                                            <img width="150" height="150" src="{{url('/'.$post->post_img)}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
                                                            <h3>{{$post->post_name}}</h3>
                                                        </a>
                                                    </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="devvn_widget_most_viewed_entries-2" class="widget devvn_widget_most_viewed_entries">
                                        <h3 class="title-sidebar">Xem nhiều nhất</h3>
                                        <ul>
                                            @foreach(listPosts() as $key=>$post)
                                                @if($key<5)
                                                <li>
                                                    <a class="news_id" data-id="{{$post->id}}" href="{{url('/news/'.$post->post_slug)}}">
                                                    <img width="150" height="150" src="{{url('/'.$post->post_img)}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" /> {{$post->post_name}} </a>
                                                </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="tag_cloud-3" class="widget widget_tag_cloud">
                                        <h3 class="title-sidebar">Từ khóa</h3>
                                        <div class="tagcloud">
                                            @foreach(listCate() as $key=>$cate)
                                                <a data-id="{{$cate->id}}" href="{{url('/category/'.$cate->cate_slug)}}" class="category_id tag-cloud-link" style="font-size: 22pt;">{{$cate->cate_name}}</a>
                                            @endforeach
                                    </div>
                                    <div id="media_image-5" class="widget widget_media_image"><img width="224" height="366" src="{{url('/vlnk')}}/images/banner-xe-dien-1.jpg" class="image wp-image-78  attachment-full size-full" alt="" style="max-width: 100%; height: auto;" /></div>
                                </div>
                            </div>
                        </div><!-- #product-90 -->
                        <div class="devvn-popup-quickbuy" data-popup="popup-quickbuy" id="popup_content_90" style="display: none;">
                            <div class="devvn-popup-inner">
                                <div class="devvn-popup-title">
                                    <span>Đặt mua IP CAMERA BÁO ĐỘNG CHỐNG TRỘM QF004 HD WIFI</span>
                                    <button type="button" class="devvn-popup-close"></button>
                                </div>
                                <div class="devvn-popup-content devvn-popup-content_90 ">
                                    <div class="devvn-popup-content-left ">
                                        <div class="devvn-popup-prod">
                                            <div class="devvn-popup-img"><img src="{{url('/vlnk')}}/images/ipcam-qf004-4-20160517042804-100x100.jpg" alt="" /></div>
                                            <div class="devvn-popup-info">
                                                <span class="devvn_title">IP CAMERA BÁO ĐỘNG CHỐNG TRỘM QF004 HD WIFI</span>
                                                <span class="devvn_price"><del><span class="woocommerce-Price-amount amount">1.590.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">1.300.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span> </div>
                                        </div>
                                        <div class="devvn_prod_variable" data-simpleprice="1300000">
                                            <form class="cart" method="post" enctype='multipart/form-data'>
                                                <div class="quantity">
                                                    <label class="screen-reader-text" for="quantity_5c27315a9318b">Số lượng</label>
                                                    <input type="number" id="quantity_5c27315a9318b" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="" />
                                                </div>
                                                <input type="hidden" name="add-to-cart" value="90" />
                                                <button type="submit" class="single_add_to_cart_button button alt" id="single_addtocart">Thêm vào giỏ</button>
                                                <a title="Hướng dẫn mua hàng" href="/huong-dan-mua-hang/" class="button huong-dan-mua-hang">Mua thêm</a>
                                                <a title="Hướng dẫn mua hàng" href="/huong-dan-mua-hang/" class="button huong-dan-mua-hang">Đặt hàng và Thanh toán</a>
                                            </form>
                                        </div>
                                        Bạn vui lòng nhập đúng số điện thoại để chúng tôi sẽ gọi xác nhận đơn hàng trước khi giao hàng. Xin cảm ơn!
                                    </div>
                                    <div class="devvn-popup-content-right">
                                        <form class="devvn_cusstom_info" id="devvn_cusstom_info" method="post">
                                            <div class="popup-customer-info">
                                                <div class="popup-customer-info-title">Sản phẩm liên quan</div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="devvn-popup-content">
                                    <ul class="products columns-4">
                                        @foreach(listProducts() as $key=>$prod)
                                        @if($key<4)
                                            <li class="product">
                                                <div class="shop_loop_box">
                                                    <a data-id="{{$prod->id}}" href="{{url('product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <span class="onsale">Giảm giá!</span>
                                                        <img src="{{url(''.$prod->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" />
                                                    </a>
                                                    <a rel="nofollow" href="/san-pham/ip-camera-bao-dong-chong-trom-qf004-hd-wifi/?add-to-cart=207" data-quantity="1" data-product_id="207" data-product_sku="SJCAM SJ4000" class="button product_type_simple add_to_cart_button ajax_add_to_cart" id="tech_addtocart_207">Thêm vào giỏ</a> 
                                                </div>
                                                <a data-id="{{$prod->id}}" href="{{url('product/'.$prod->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    <h2 class="woocommerce-loop-product__title">{{$prod->prod_name}}</h2>
                                                </a>
                                                <span class="price"><del><span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">{{number_format($prod->prod_price, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                                                <div class="devvn_is_featured"><img width="80" height="44" src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="" /></div>
                                            </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        div#container {
            width: 100%;
        }
        @media (min-width: 768px)
        {
            .col-sm-push-3 {
                left: inherit;
            }
        }
    </style>
    
   {{--  <div id="show_phone_mobile_popup">
        <p style="text-align: center;"><strong>Hotline</strong></p>
        <p style="text-align: center;">Hà Nội:&nbsp;<a href="tel:0938941111"><strong>0938.94.1111</strong></a><br>
            Tp.HCM: <a href="tel:0938941115"><strong>0938.94.1115</strong></a></p>
    </div> --}}
@endsection