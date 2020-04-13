<aside id="sidebar" class="sidebar col-md-3 col-sm-3 col-xs-12 col-sm-pull-9">
    <div class="widget block-sidebar woocommerce widget_product_categories">
        <h3 class="title-sidebar">Loại sản phẩm</h3>
        <ul class="product-categories">
            @foreach(listCate() as $key=>$cate)
            <li class="cat-item"><a class="category_id" data-id="$cate->id" href="{{url('/category/'.$cate->cate_slug)}}">{{$cate->cate_name}}</a> <span class="count">({{count($cate->products)}})</span></li>
            @endforeach
        </ul>
    </div>
    <div class="widget block-sidebar devvn_woocommerce_price_list_filter woocommerce widget_layered_nav">
        <h3 class="title-sidebar">Shop by Price</h3>
        <ul class="woocommerce-widget-layered-nav-list">
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                <a href="#">Dưới 1 triệu</a> <span class="count">(4)</span> </li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                <a href="#">Từ 1 - 2 triệu</a> <span class="count">(5)</span> </li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                <a href="#">Từ 2 - 3 triệu</a> <span class="count">(1)</span> </li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                <a href="#">Từ 3 - 4 triệu</a> <span class="count">(0)</span> </li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                <a href="#">Trên 4 triệu</a> <span class="count">(4)</span> </li>
        </ul>
    </div>
    <div class="widget block-sidebar woocommerce widget_layered_nav woocommerce-widget-layered-nav">
        <h3 class="title-sidebar">Bộ nhớ</h3>
        <ul class="woocommerce-widget-layered-nav-list">
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">4GB</a> <span class="count">(2)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">8GB</a> <span class="count">(3)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">16GB</a> <span class="count">(1)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">32GB</a> <span class="count">(2)</span></li>
        </ul>
    </div>
    <div class="widget block-sidebar woocommerce widget_layered_nav woocommerce-widget-layered-nav">
        <h3 class="title-sidebar">Tốc độ xử lý</h3>
        <ul class="woocommerce-widget-layered-nav-list">
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">1.2 GHZ</a> <span class="count">(1)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">1.5 GHZ</a> <span class="count">(1)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">1.6 GHZ</a> <span class="count">(1)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">2.0 GHZ</a> <span class="count">(1)</span></li>
        </ul>
    </div>
    <div class="widget block-sidebar news_category_widget">
        <h3 class="title-sidebar">Tin tức</h3>
        <ul class="news_list">
            @foreach(listPosts() as $key=>$post)
            @if($key<4)
                <li class="has-thumbnail">
                    <a class="news_id" data-id="{{$post->id}}" href="{{url('/news/'.$post->post_slug)}}" title="{{$post->post_name}}">
                        <img width="150" height="150" src="{{url('/'.$post->post_img)}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{$post->post_name}}" >
                        <h3>{{$post->post_name}}</h3>
                    </a>
                </li>
            @endif
            @endforeach
        </ul>
    </div>
    <div class="widget block-sidebar videos_category_widget">
        <h3 class="title-sidebar">Videos</h3>
        <ul class="news_list videos_list">
            @foreach(listVideos() as $key=>$video)
            @if($key<4)
                <li class="has-thumbnail">
                    <a class="videos_id" data-id="{{$video->id}}" href="{{url('videos/'.$video->video_slug)}}" title="{{$video->video_name}}">
                        <img width="150" height="150" src="{{url('/'.$video->video_img)}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{$video->video_name}}">
                        <h3>{{$video->video_name}}</h3>
                    </a>
                </li>
            @endif
            @endforeach
        </ul>
    </div>
    <div class="widget block-sidebar widget_sp_image">
        <h3 class="title-sidebar">Máy chiếu văn phòng-lớp học</h3><img width="427" height="640" alt="Máy chiếu văn phòng-lớp học" class="attachment-full" style="max-width: 100%;" src="https://tech360.vn/wp-content/uploads/2016/11/banner-tyco-t35-20160722204411.jpg">
    </div>
</aside>