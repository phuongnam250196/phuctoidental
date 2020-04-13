@extends('frontend.layout')
@if(Request::is('news/category') || Request::is('news/category/*'))
    @section('title', 'Tin tức theo mục: '.$cate->cate_name)
    @section('description', 'Bạn đang xem danh sách tin tức theo danh mục: '.$cate->cate_name)
    @section('image', url('/'.infoOther()->logo))
    @section('url', url('/news/category/'.$cate->cate_name))
    @section('sitename', $_SERVER['REQUEST_URI'])
    @section('keywords', $cate->cate_name)
    @section('author', $_SERVER['HTTP_HOST'])
@elseif(Request::is('news/search') || Request::is('news/search/*'))
    @section('title', 'Tin tức tìm kiếm: '.$_GET['word'])
    @section('description', 'Bạn đang xem danh sách tin tức theo tìm kiếm: '.$_GET['word'])
    @section('image', url('/'.infoOther()->logo))
    @section('url', url('news/search?word='.$_GET['word']))
    @section('sitename', $_SERVER['REQUEST_URI'])
    @section('keywords', $_GET['word'])
    @section('author', $_SERVER['HTTP_HOST'])
@else
    @section('title', 'Tin tức')
    @section('description', 'Bạn đang xem danh sách tất cả tin tức được sắp xếp theo thứ tự mới nhất')
    @section('image', url('/'.infoOther()->logo))
    @section('url', url('/news'))
    @section('sitename', $_SERVER['REQUEST_URI'])
    @section('keywords', 'Tin tức, danh sách tin tức')
    @section('author', $_SERVER['HTTP_HOST'])
@endif

@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div class="main_container col-md-9 col-sm-9 col-xs-12">
                    <main id="main" class="site-main" role="main">
                        @if(Request::is('news/category') || Request::is('news/category/*'))
                            <div class="breadcrumb"><span><span><a href="{{url('/')}}">Trang chủ</a> / <a href="{{url('/news')}}"><span class="breadcrumb_last" aria-current="page">Tin tức</span></a> / <span class="breadcrumb_last" aria-current="page">{{$cate->cate_name}}</span></span></span></div>
                        @elseif(Request::is('news/search') || Request::is('news/search/*'))
                            <div class="breadcrumb"><span><span><a href="{{url('/')}}">Trang chủ</a> / <a href="{{url('/news')}}"><span class="breadcrumb_last" aria-current="page">Tin tức</span></a> / <span class="breadcrumb_last" aria-current="page">Tìm kiếm {{$_GET['word']}}</span></span></span></div>
                        @else
                            <div class="breadcrumb"><span><span><a href="{{url('/')}}">Trang chủ</a> / <span class="breadcrumb_last" aria-current="page">Tin tức</span></span></span></div>
                        @endif
                        <div class="page_content">
                            <header>
                                @if(Request::is('news/category') || Request::is('news/category/*'))
                                    <h1 class="title-page">Tin tức theo mục: {{$cate->cate_name}}</h1>
                                @elseif(Request::is('news/search') || Request::is('news/search/*'))
                                    <h1 class="title-page">Tin tức tìm kiếm: {{$_GET['word']}}</h1>
                                @else
                                    <h1 class="title-page">Tin tức</h1>
                                @endif
                            </header>
                            <section id="latest-posts" class="clearfix">
                                @foreach($posts as $key=>$post)
                                <article class="post-box has_thumbnail">
                                    <div class="post-img">
                                        <a class="news_id" data-id="{{$post->id}}" href="{{url('/news/'.$post->post_slug)}}" title="{{$post->post_name}}" rel="nofollow">
                                            <img width="300" height="300" src="{{url('/'.$post->post_img)}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="{{$post->post_name}}"> </a>
                                    </div>
                                    <div class="post-data">
                                        <div class="post-data-container">
                                            <header>
                                                <h2 class="title post-title"><a class="news_id" data-id="{{$post->id}}" href="{{url('/news/'.$post->post_slug)}}" title="{{$post->post_name}}">{{$post->post_name}}</a></h2>
                                                <div class="post-info">
                                                    <span class="thetime updated"><i class="fa fa-clock-o"></i> <span>{{date_format($post->created_at, 'd/m/Y')}}</span></span>
                                                </div>
                                            </header>
                                            <div class="post-excerpt">
                                                <p>{!! strip_tags(preg_replace("/<img[^>]+\>/i", "(image) ", $post->post_content)) !!}</p>
                                            </div>
                                            <a class="news_id read_more" data-id="{{$post->id}}" href="{{url('/news/'.$post->post_slug)}}" title="{{$post->post_name}}" rel="nofollow">Xem thêm</a>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                <style>
                                    .post-excerpt p {
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        -webkit-line-clamp: 3;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;
                                    }
                                </style>
                            </section>
                            {{$posts->links('vendor.pagination.simple-news')}}
                        </div>
                    </main>
                </div>
                @include('frontend.nav.aside_news_videos')
                <div class="clearfix"></div>
                <div class="col-xs-12">
                    @include('frontend.nav.product_noibat')
                </div>
            </div>
        </div>
    </div>
@endsection