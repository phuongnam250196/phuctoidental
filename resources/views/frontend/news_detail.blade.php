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
                <div class="main_container col-md-9 col-sm-9 col-xs-12">
                    <main id="main" class="site-main" role="main">
                        <div class="breadcrumb"><span><span><a href="{{url('/')}}">Trang chủ</a> / <span><a href="{{url('/news')}}">Tin tức</a> / <span class="breadcrumb_last" aria-current="page">{{$post->post_name}}</span></span></span></span></div>
                        <div class="page_content">
                            <header>
                                <h1 class="title-page">{{$post->post_name}}</h1>
                                <div class="post-info">
                                    <span class="thetime updated"><i class="fa fa-clock-o"></i> <span>{{date_format($post->created_at, 'd/m/Y')}}</span></span>
                                    <span class="post_count"><i class="fa fa-eye"></i> <span>
                                            <p class="bawpvc-ajax-counter">{{!empty($view->count)?$view->count:0}} lượt xem</p>
                                        </span></span>
                                </div>
                            </header>
                            <div class="tinymce">
                                {!! $post->post_content !!}
                            </div>
                            <ul class="social_list">
                                <li class="facebook_like">
                                    <div class="fb-like" data-href="{{url('news/'.$post->post_slug)}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                </li>
                            </ul>
                            <div class="post_navigation">
                                <nav class="navigation post-navigation" role="navigation">
                                    <h2 class="screen-reader-text">Điều hướng bài viết</h2>
                                    <div class="nav-links">
                                        @foreach($post_others as $key=>$posttwo)
                                        @if($key<2)
                                            <div class="@if($key==0) nav-previous @else nav-next @endif"><a data-id="{{$posttwo->id}}" class="news_id" href="{{url('/news/'.$posttwo->post_slug)}}" rel="@if($key==0) prev @else next @endif"><span class="meta-nav" aria-hidden="true">@if($key==0) Bài trước @else Bài tiếp @endif</span> <br><span class="post-title">{{$posttwo->post_name}}</span></a></div>
                                        @endif
                                        @endforeach
                                    </div>
                                </nav>
                            </div>
                            <div class="relatedcat">
                                <div class="section_cvp_title margin-b-15">
                                    <h2>Có thể bạn quan tâm</h2>
                                </div>
                                <div class="row row-padding-15">
                                    @foreach($post_others as $key=>$post2)
                                        <div class="col-sm-6 col-xs-12 margin-b-15">
                                            <a class="news_id" data-id="{{$post2->id}}" href="{{url('/news/'.$post2->post_slug)}}" title="{{$post2->post_name}}">
                                                <img width="300" height="300" src="{{url('/'.$post2->post_img)}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="{{$post2->post_name}}"> {{$post2->post_name}} </a>
                                            <div class="post-info">
                                                <span class="thetime updated"><i class="fa fa-clock-o"></i> <span>{{date_format($post2->created_at, 'd/m/Y')}}</span></span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <div class="row row-padding-15">
                                <div class="col-xs-12 product-review-left">
                                    <div class="section_cvp_title margin-b-15">
                                        <h2>Đánh giá tin tức</h2>
                                    </div>
                                    <div id="reviews" class="woocommerce-Reviews">
                                        <div id="comments">
                                            @if(!empty($comments))
                                            <h2 class="woocommerce-Reviews-title">
                                                {{count($comments)}} đánh giá cho <span>{{$post->post_name}}</span> </h2>
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
                                                    <form action="{{url('/review/news')}}" method="post" id="commentform" class="comment-form">
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
                                                            <input type="hidden" name="news_id" value="{{$post->id}}">
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
                    </main>
                </div>
                @include('frontend.nav.aside_news_videos')
            </div>
        </div>
    </div>
@endsection