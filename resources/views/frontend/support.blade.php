@extends('frontend.layout')
@section('title', 'Hỗ trợ khách hàng')
@section('description', 'Hỗ trợ và giải đáp những thắc mắc của khách hàng trong quá trình mua hàng cũng như liên hệ')
@section('image', url('/'.infoOther()->logo))
@section('url', url('support'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Hỗ trợ, khách hàng, hỗ trợ khách hàng, liên hệ, mua hàng, đặt hàng, thanh toán, gọi điện')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;&#47;&nbsp;Hỗ trợ khách hàng</nav>
                <div class="main_container col-md-9 col-sm-9 col-xs-12 col-sm-push-3">
                    <div class="page_content">
                        <h1 class="title-page">Hỗ trợ khách hàng</h1>
                        <div class="tinymce">
                            <p><span style="color: #0000ff;"><strong>I- MUA HÀNG OFFLINE – PHƯƠNG THỨC GIAO HÀNG – TRẢ TIỀN MẶT</strong></span></p>
                            <p>– Phương thức Giao hàng – Trả tiền mặt chỉ áp dụng đối với những khu vực TECH360 hỗ trợ giao nhận (phạm vi giao hàng ≤ 10km tính từ trung tâm của hệ thống TECH360) hoặc trả tiền mua hàng trực tiếp tại TECH360 <br>– Với phương thức thanh toán trực tiếp Quý khách có thể đặt hàng trên Website hoặc đặt hàng qua điện thoại:0243.944.7979 – 0938.94.1111 – 0938.94.1115.Nhân viên chúng tôi sẽ tiến hành xuất hàng cho Quý khách và xác nhận ngày giờ giao hàng với Quý khách sau khi xuất hàng. <br>– Quý khách có trách nhiệm thanh toán đầy đủ toàn bộ giá trị đơn hàng cho Nhân viên giao nhận hoặc Nhân viên bán hàng và chăm sóc khách hàng của TECH360 ngay khi hoàn tất kiểm tra hàng hóa và nhận Phiếu giao hàng kiêm phiếu xuất kho.Hoặc có thể thanh toán quẹt thẻ ATM, VISA trực tiếp tại cửa hàng TECH360. Quý khách thanh toán đúng số tiền trên Phiếu đã ghi, nếu có bất cứ thắc mắc nào Quý khách gọi lại cho TECH360 để được thông tin cụ thể hơn.</p>
                            <p><span style="color: #0000ff;"><strong>II – MUA HÀNG ONLINE – PHƯƠNG THỨC THANH TOÁN TRƯỚC</strong></span></p>
                            <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#8217;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#8217;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>
                <aside id="sidebar" class="sidebar col-md-3 col-sm-3 col-xs-12 col-sm-pull-9" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
                    <div id="newsnoibat_widget-2" class="widget newsnoibat_widget">
                        <h3 class="title-sidebar">Tin tức mới</h3>
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
            </div>
        </div>
    </div>
@endsection