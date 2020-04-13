<div class="section_custom_view_products">
    <div class="section_cvp_title">
        <h3>Sản phẩm nổi bật</h3>
    </div>
    <div class="section_cvp_content">
        <div class="woocommerce columns-5">
            <ul class="products columns-5">
                @foreach(listProducts() as $key=>$product)
                @if($key<5)
                    <li class="product">
                        <div class="shop_loop_box">
                            <a class="product_id" data-id="{{$product->id}}" href="{{url('product/'.$product->prod_slug)}}">
                                @if(!empty($product->prod_sale))
                                    <span class="onsale">Giảm giá!</span>
                                @endif
                                <img width="300" height="300" src="{{url('/'.$product->prod_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" />
                            </a>
                            <a data-price="{{$product->prod_price_sale}}" data-product_id="{{$product->id}}" data-amount="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ</a>
                        </div>
                        <a data-id="{{$product->id}}" href="{{url('product/'.$product->prod_slug)}}" class="product_id woocommerce-LoopProduct-link woocommerce-loop-product__link">
                            <h2 class="woocommerce-loop-product__title">{{$product->prod_name}}</h2>
                        </a>
                        <span class="price">
                            @if(!empty($product->prod_sale))
                                <del>
                                    <span class="woocommerce-Price-amount amount">{{number_format($product->prod_price, 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                </del>
                            @endif 
                            <ins>
                                <span class="woocommerce-Price-amount amount">{{number_format($product->prod_price-($product->prod_price*$product->prod_sale*0.01), 0,'.','.')}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                            </ins>
                        </span>
                        @if(!empty($product->hot))
                            <div class="devvn_is_featured">
                                <img src="{{url('/vlnk')}}/images/70_58013_1a.png" class="attachment-full size-full" alt="" />
                            </div>
                        @endif
                        @if(!empty($product->installment))
                            <div class="devvn_is_tragop">
                                <img src="{{url('/vlnk')}}/images/tap-tragop0dong.png" /> 
                                <a class="product_id" data-id="{{$product->id}}" href="{{url('/product/'.$product->prod_slug)}}">Xem chi tiết <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        @endif
                    </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>