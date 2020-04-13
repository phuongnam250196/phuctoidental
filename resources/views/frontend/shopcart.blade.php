@extends('frontend.layout')
@section('title', 'Giỏ hàng')
@section('description', 'Hiển thị những sản phẩm mà khách hàng thêm vào cũng như định mua')
@section('image', url('/'.infoOther()->logo))
@section('url', url('cart'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'Giỏ hàng, thanh toán')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div class="main_container col-xs-12">
                    <div class="breadcrumb"><span><span><a href="{{url('/')}}">Trang chủ</a> / <span class="breadcrumb_last" aria-current="page">Giỏ hàng</span></span></span></div>
                    <div class="page_content">
                        <h1 class="title-page">Giỏ hàng</h1>
                        <div class="tinymce">
                            @if(empty($total))
                                <p>Không có sản phẩm nào trong giỏ hàng!</p>
                            @else
                                <div class="woocommerce">
                                    <div class="woocommerce-notices-wrapper"></div>
                                    <form class="woocommerce-cart-form" method="post">
                                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="product-remove">&nbsp;</th>
                                                    <th class="product-thumbnail">&nbsp;</th>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-price">Giá</th>
                                                    <th class="product-quantity">Số lượng</th>
                                                    <th class="product-subtotal">Tổng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$dat)
                                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                                    <td class="product-remove">
                                                        <a href="#" class="remove cart-remove remove-{{$dat->id}}" data-id="{{$dat->id}}" aria-label="Xóa sản phẩm này">×</a> </td>
                                                    <td class="product-thumbnail">
                                                        <a href="{{url('product/'.$dat->products->prod_slug)}}"><img width="300" height="300" src="{{url(''.$dat->products->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" ></a> </td>
                                                    <td class="product-name" data-title="Sản phẩm">
                                                        <a href="{{url('product/'.$dat->products->prod_slug)}}">{{$dat->products->prod_name}}</a>
                                                    </td>
                                                    <td class="product-price" data-title="Giá">
                                                        <span class="woocommerce-Price-amount amount">{{number_format($dat->products->prod_price_sale, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span> </td>
                                                    <td class="product-quantity" data-title="Số lượng">
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus">
                                                            <input type="number" class="input-text qty number_change text" step="1" min="0" max="" name="{{$dat->product_id}}" data-id="{{$dat->id}}" data-price="{{$dat->products->prod_price_sale}}" value="{{$dat->amount}}" title="SL" size="4" inputmode="numeric">
                                                            <input type="button" value="+" class="plus">
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Tổng">
                                                        <span class="woocommerce-Price-amount amount show-price-{{$dat->id}}">{{number_format($dat->price, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span> </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="actions">
                                                        {{-- <div class="coupon">
                                                            <label for="coupon_code">Ưu đãi:</label> 
                                                            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi"> 
                                                            <a id="abc" class="button" name="apply_coupon" value="Áp dụng">Áp dụng</a>
                                                        </div> --}}
                                                        <button type="submit" class="button" value="Cập nhật giỏ hàng" @if(empty($total)) disabled="" @endif>Cập nhật giỏ hàng</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{csrf_field()}}
                                    </form>
                                    <div class="cart-collaterals">
                                        <div class="cart_totals ">
                                            <h2>Tổng số lượng</h2>
                                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                                <tbody>
                                                    <tr class="cart-subtotal">
                                                        <th>Tổng phụ</th>
                                                        <td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount">{{number_format($total, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Tổng</th>
                                                        <td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount">{{number_format($total, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="wc-proceed-to-checkout">
                                                <a href="{{url('pay')}}" class="checkout-button button alt wc-forward" @if(empty($total)) style="display: none" @endif>
                                                    Tiến hành thanh toán</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection