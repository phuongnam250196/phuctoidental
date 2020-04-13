@extends('frontend.layout')
@section('title', 'Thanh toán')
@section('description', 'Thực hiện và hoàn thành theo các bước để đặt hàng.')
@section('image', url('/'.infoOther()->logo))
@section('url', url('/pay'))
@section('sitename', $_SERVER['REQUEST_URI'])
@section('keywords', 'pay')
@section('author', $_SERVER['HTTP_HOST'])
@section('main')
	<div class="main_body">
        <div class="container">
            <div class="row row-padding-15">
                <div class="main_container col-xs-12">
                    <div class="breadcrumb"><span><span><a href="{{url('/')}}">Trang chủ</a> / <span class="breadcrumb_last" aria-current="page">Thanh toán</span></span></span></div>
                    <div class="page_content">
                        <h1 class="title-page">Thanh toán</h1>
                        <div class="tinymce">
                            @if(empty($total))
                                <p>Không có sản phẩm nào để thanh toán!</p>
                            @else
                            <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                @if(empty(Cookie::get('email')))
                                    <div class="woocommerce-info">
                                    Bạn đã có tài khoản? {{Cookie::get('email')}} <a href="#"  class="showlogin">Ấn vào đây để đăng nhập</a>. Nếu bạn chưa có tài khoản, bạn hãy điền thông tin bên dưới và tạo tài khoản mới. </div>
                                @endif
                                <script type="text/javascript">
                                    (function($) {
                                        $(document).ready(function() {
                                            $('.showlogin').on('click', function() {
                                                $('.woocommerce-form').toggle()
                                            });
                                        });
                                    })(jQuery);
                                </script>
                                <form class="woocommerce-form woocommerce-form-login login" action="{{url('pay/login')}}" method="post" style="display:none;">
                                    <p>Nếu bạn đã mua sắm với chúng tôi trước đây, vui lòng đăng nhập để có thể thanh toán. Nếu bạn là khách hàng mới thì vui lòng nhập đầy đủ thông tin và chọn thanh toán.</p>
                                    <p class="form-row form-row-first">
                                        <label for="username">Tên đăng nhập hoặc email&nbsp;<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="email" id="username" @if(empty(Cookie::get('email'))) value="" @else value="{{show_info_email()->email}}" @endif>
                                        @if($errors->has('email'))
                                            <p class="help text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </p>
                                    <p class="form-row form-row-last">
                                        <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password" id="password" autocomplete="current-password">
                                        @if($errors->has('password'))
                                            <p class="help text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </p>
                                    <div class="clear"></div>
                                    <p class="form-row">
                                        <label class="woocommerce-form__label">
                                            <input name="remember" type="checkbox" id="remember" value="nho" /> <span><strong>Ghi nhớ</strong></span>
                                        </label>
                                    </p>
                                    <p class="form-row">
                                        <button type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập">Đăng nhập</button>
                                        <span style="float: right;padding: 5px 0;">
                                            <a href="{{url('/register')}}">Đăng ký</a> | 
                                            <a href="{{url('/forgot')}}">Quên mật khẩu?</a>
                                        </span>
                                    </p>
                                    <div class="clear"></div>
                                    {{csrf_field()}}
                                </form>

                                {{-- Chưa làm mã ưu đãi v1 --}}
                                {{-- <div class="woocommerce-info">
                                    Bạn có mã ưu đãi? <a href="#" class="showcoupon">Ấn vào đây để nhập mã</a> </div> --}}
                                <form class="checkout_coupon" method="post" style="display:none">
                                    <p class="form-row form-row-first">
                                        <input type="text" name="coupon_code" class="input-text" placeholder="Mã ưu đãi" id="coupon_code" value="">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <input type="submit" class="button" name="apply_coupon" id="button_appdung_makhuyenmai" value="Apply Coupon">
                                    </p>
                                    <div class="clear"></div>
                                </form>
                                <div class="woocommerce-notices-wrapper"></div>
                                <form method="POST" class="checkout woocommerce-checkout" action="{{url('pay')}}" enctype="multipart/form-data">
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Tổng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $arr = '';
                                                    $arr_pr_id = '';
                                                ?>
                                                @foreach($data as $key=>$dat)
                                                    <?php
                                                        $arr = $arr.'##'.$dat->products->id.'_'.$dat->amount.'_'.$dat->price;
                                                        $arr_pr_id = $arr_pr_id.'##'.$dat->products->id;
                                                    ?>
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            {{$dat->products->prod_name}}&nbsp; <strong class="product-quantity">× {{$dat->amount}}</strong> 
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="woocommerce-Price-amount amount">{{number_format($dat->price, 0,'.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span> 
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Tổng phụ</th>
                                                    <td>
                                                        <span class="woocommerce-Price-amount amount">{{number_format($total, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Tổng</th>
                                                    <td>
                                                        <strong><span class="woocommerce-Price-amount amount">{{number_format($total, 0, '.', '.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> 
                                                    </td>
                                                    <td style="display: none;">
                                                        <input type="text" name="total_price" value="{{$total}}"  style="display: none;">
                                                        <input type="text" name="order_list_product" value="{{$arr}}"  style="display: none;">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col2-set" id="customer_details">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Thông tin thanh toán</h3>
                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                    <p class="form-row form-row-wide validate-required" id="billing_last_name_field">
                                                        <label class="">Họ và tên</label>
                                                        <input type="text" class="input-text " name="name" id="billing_last_name" placeholder="Nhập đầy đủ họ và tên của bạn" @if(empty(Cookie::get('email'))) value="" @else value="{{show_info_email()->name}}" @endif>
                                                    </p>
                                                    <p class="form-row">
                                                        <label class="">Địa chỉ</label>     
                                                        <input type="text" class="input-text " name="address" id="billing_address_1" placeholder="VD: Số 18 Ngõ 86 Phú Kiều, Bắc Từ Liêm, Hà Nội" @if(empty(Cookie::get('email'))) value="" @else value="{{show_info_email()->address}}" @endif>
                                                    </p>
                                                    <p class="form-row form-row-wide" id="billing_phone_field">
                                                        <label class="">Số điện thoại</label>
                                                        <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="VD: 0978 987 166" @if(empty(Cookie::get('email'))) value="" @else value="{{show_info_email()->phone}}" @endif>
                                                    </p>
                                                    <p class="form-row form-row-wide" id="billing_email_field">
                                                        <label class="">Địa chỉ email</label>
                                                        <input type="email" class="input-text " name="email" id="billing_email" placeholder="" @if(empty(Cookie::get('email'))) value="" @else value="{{show_info_email()->email}}" @endif>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="woocommerce-account-fields">
                                                @if(empty(Cookie::get('email')))
                                                <p class="form-row">
                                                    <label class="checkbox">
                                                        <input class="input-checkbox" id="createaccount" type="checkbox" name="createaccount" value="1"> <span>Tạo tài khoản mới?</span>
                                                    </label>
                                                </p>
                                                <script type="text/javascript">
                                                    (function($) {
                                                        $(document).ready(function() {
                                                            $('#createaccount').on('click', function() {
                                                                $('.create-account').toggle()
                                                            });
                                                        });
                                                    })(jQuery);
                                                </script>
                                                @endif
                                                <div class="create-account" style="display: none;">
                                                    <p class="form-row" id="account_password_field">
                                                        <label class="">Tạo mật khẩu của tài khoản</label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <input type="password" class="input-text " name="password" id="account_password" placeholder="Mật khẩu" value="">
                                                        </span>
                                                    </p>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="woocommerce-shipping-fields">
                                            </div>
                                            <div class="woocommerce-additional-fields">
                                                <h3>Thông tin bổ sung</h3>
                                                <div class="woocommerce-additional-fields__field-wrapper">
                                                    <p class="form-row notes" id="order_comments_field">
                                                        <label for="order_comments" class="">Ghi chú đơn hàng&nbsp;<span class="optional">(tuỳ chọn)</span></label>
                                                        <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." rows="2" cols="5"></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_cod">
                                                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">
                                                <label for="payment_method_cod">
                                                    Trả tiền mặt khi nhận hàng </label>
                                            </li>
                                          {{--   <li class="wc_payment_method payment_method_vnpay">
                                                <input id="payment_method_vnpay" type="radio" class="input-radio" name="payment_method" value="vnpay" data-order_button_text="">
                                                <label for="payment_method_vnpay">
                                                    Thanh toán qua VNPAY </label>
                                                <div class="payment_box payment_method_vnpay" style="display:none;">
                                                    <p>Thanh toán trực tuyến qua VNPAY</p>
                                                </div>
                                            </li> --}}
                                        </ul>
                                        <div class="form-row place-order">
                                            <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" @if(empty($total)) disabled @endif>Đặt hàng</button>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection