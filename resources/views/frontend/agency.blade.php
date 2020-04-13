@extends('frontend.layout')
@section('title', 'Hệ thống đại lý')
@section('description', 'Quản lý cũng như cho biết các đại lý đang liên kết với cơ sở')
@section('image', url('/'.infoOther()->logo))
@section('url', url('/agency'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Liên hệ, đại lý, hệ thống đại lý, cửa hàng, sản phẩm')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <nav class="woocommerce-breadcrumb"><a href="{{url('/')}}">Trang chủ</a>&nbsp;&#47;&nbsp;Hệ thống đại lý</nav>
                <div class="main_container col-xs-12">
                    <div class="page_content">
                        <h1 class="title-page">Hệ thống đại lý</h1>
                        <div class="tinymce">
                            <div class="dvls_maps_wrap">
                                <div class="dvls_maps_container">
                                    <div class="dvls_maps_row dvls_maps_header">
                                        <div class="dvls_maps_header_left">Tìm kiếm cửa hàng</div>
                                        <div class="dvls_maps_header_right">
                                            <form action="" method="get">
                                                <div class="dvls_maps_3col">
                                                    <div class="dvls_maps_col">
                                                        <select name="city" id="dvls_city" data-value="">
                                                            <option value="null">Chọn tỉnh, thành phố</option>
                                                        </select>
                                                    </div>
                                                    <div class="dvls_maps_col">
                                                        <select name="district" id="dvls_district" data-value="">
                                                            <option value="null">Chọn quận, huyện</option>
                                                        </select>
                                                    </div>
                                                    <div class="dvls_maps_col">
                                                        <input type="hidden" id="dvls_nonce" name="dvls_nonce" value="322f9c13f4" /><input type="hidden" name="_wp_http_referer" value="/he-thong-dai-ly/" /> <input value="Tìm kiếm" type="submit" class="dvls-submit" />
                                                    </div>
                                                </div>
                                                <div class="dvls_maps_col">
                                                    <a href="javascript:void(0);" class="dvls_near_you" title="Tìm kiếm cửa hàng gần bạn (<=20 km)">Tìm kiếm cửa hàng gần bạn (<=20 km)</a> 
                                                </div> 
                                            </form> 
                                        </div> 
                                    </div> 
                                    <div class="dvls_maps_row dvls_maps_body">
                                        <div class="dvls_maps_sidebar">
                                            <div class="dvls_maps_sidebar_content">
                                                <div class="dvls_result_status">Tìm thấy <strong></strong> cửa hàng</div>
                                                <div class="dvls_result_wrap">
                                                    Đang tải... </div>
                                            </div>
                                        </div>
                                        <div class="dvls_maps_main">
                                            <div id="dvls_maps" data-lat="21.020799" data-lng="105.809476"></div>
                                        </div>
                                        <div id="dvls_fountainG">
                                            <div id="fountainG_1" class="fountainG"></div>
                                            <div id="fountainG_2" class="fountainG"></div>
                                            <div id="fountainG_3" class="fountainG"></div>
                                            <div id="fountainG_4" class="fountainG"></div>
                                            <div id="fountainG_5" class="fountainG"></div>
                                            <div id="fountainG_6" class="fountainG"></div>
                                            <div id="fountainG_7" class="fountainG"></div>
                                            <div id="fountainG_8" class="fountainG"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection