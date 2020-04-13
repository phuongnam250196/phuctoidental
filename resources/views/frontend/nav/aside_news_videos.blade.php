<aside id="sidebar" class="sidebar col-md-3 col-sm-3 col-xs-12">
    <div id="search-2" class="widget widget_search">
        <div>
            @if(Request::is('videos') || Request::is('videos/*'))
                <form method="GET" class="form-inline" id="searchform" action="{{url('videos/search')}}">
                    <input type="text" class="form-control field" id="s" value="@if(!empty($_GET['word'])) {{$_GET['word']}} @endif" name="word" placeholder="Tìm kiếm tin tức" />
                    <button type="submit" class="btn btn-default" id="searchsubmit">Tìm kiếm</button>
                    {{csrf_field()}}
                </form>
            @else
                <form method="GET" class="form-inline" id="searchform" action="{{url('news/search')}}">
                    <input type="text" class="form-control field" id="s" value="@if(!empty($_GET['word'])) {{$_GET['word']}} @endif" name="word" placeholder="Tìm kiếm tin tức" />
                    <button type="submit" class="btn btn-default" id="searchsubmit">Tìm kiếm</button>
                    {{csrf_field()}}
                </form>
            @endif
        </div>
    </div>
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
</aside>