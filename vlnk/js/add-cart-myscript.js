(function($) {
	var url = 'http://phuctoidental.com/';


	// Hiển thị số sản phẩm trong giỏ hàng
    function load_cart() {
        var user_id = $('#user_id').val();
    // console.log(user_id);

        $.ajax({
            url: url + 'listtocart',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            data: {
            	user_id: user_id
            },
            success: function(data) {
                console.log(data);
                if (data.data.length != 0) {
                	$('.total_price').text(data.total);
                    $('#pr_count').text(data.data.length);
                    for (var i = 0; i < data.data.length; i++) {
                        $('#cart_id_none').prepend('<li class="mini_cart_item">' +
                            '<a href="#" style="line-height:1;" class="remove remove-'+data.data[i].id+'" title="Xóa sản phẩm này" data-id="' + data.data[i].id + '">×</a>' +
                            '<a href="' + url + 'product/' + data.data[i].products.prod_slug + '">' +
                            '<img width="300" height="300" src="' + url+data.data[i].products.prod_img + '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">' + data.data[i].products.prod_name + '</a>' +
                            '<span class="quantity">' + data.data[i].amount + ' × <span class="woocommerce-Price-amount amount">' + formatNumber(data.data[i].products.prod_price_sale) + '&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>' +
                            '</li>');
                        $('#list_cart_right').prepend('<li class="mini_cart_item">'+
                            '<a href="#" class="remove remove-'+data.data[i].id+'" title="Xóa sản phẩm này" data-id="'+data.data[i].id+'">×</a>'+
                            '<a href="'+url+'product/'+data.data[i].products.prod_slug+'">'+
                                '<img width="300" height="300" src="'+url+data.data[i].products.prod_img+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" >'+ data.data[i].products.prod_name +'&nbsp; </a>'+
                            '<span class="quantity">'+data.data[i].amount+' × <span class="woocommerce-Price-amount amount">'+ formatNumber(data.data[i].products.prod_price_sale) + '&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>'+
                        '</li>');
                    }
                    $('.buttons').show();
                    $('.total').show();
                } else {
                    $('#cart_id_none').prepend('<li class="empty">Chưa có sản phẩm trong giỏ hàng.</li>');
                    $('#list_cart_right').prepend('<li class="empty">Chưa có sản phẩm trong giỏ hàng.</li>');
                    $('#pr_count').text(0);
                    $('.buttons').hide();
                    $('.total').hide();
                }
            }
        });
    }
    load_cart();

    $(document).ready(function() {
    	// Thêm sản phẩm vào giỏ hàng
    	$('.add_to_cart_button').click(function() {
            var id = $(this).data('product_id');
            var price = $(this).data('price');
            var user_id = $('#user_id').val();
            if(user_id === "") {
                alert('Bạn phải đăng nhập để thêm sản phẩm.');
            } else {
                console.log(user_id);

                // console.log(id);
                $.ajax({
                    url: url+'addtocart',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: {
                        id:id,
                        user_id: user_id,
                        amount: 1,
                        price: price
                    },
                    success: function(data) {
                        // console.log(data);
                        // console.log('thanh cong');
                        if(data.message.code == 200) {
                            console.log(data.total);
                            $('#pr_count').text(data.count);
                            $('.total_price').text(data.total);
                            $('#total_cost_popup').html(formatNumber(data.total)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span>');
                            $('#popup_cost').html(formatNumber(data.data.products.prod_price)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span>');
                            $('#popup_cost_present').html(formatNumber(data.data.products.prod_price_sale)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span>');
                            var link_pr = '<div class="product-thumb"><a href="'+url+'product/'+data.data.products.prod_slug+'">'+
                                            '<img width="300" height="300" src="'+url+data.data.products.prod_img+'" alt="">'+
                                        '</a></div>';
                            $('.product-thumb').replaceWith(link_pr);
                            var link_name = '<h3 class="product-title product-title-popup"><a href="'+url+'product/'+data.data.products.prod_slug+'">'+data.data.products.prod_name+'</a></h3>';
                            $('.product-title-popup').replaceWith(link_name);
                            console.log($('.remove-'+data.data.id).attr('data-id'));
                            if($('.remove-'+data.data.id).attr('data-id') == undefined) {
    	                        $('#cart_id_none').prepend('<li class="mini_cart_item">'+
    	                            '<a href="#" style="line-height:1;" class="remove remove-'+data.data.id+'" title="Xóa sản phẩm này" data-id="'+data.data.id+'">×</a>'+
    	                            '<a href="'+url+'product/'+data.data.products.prod_slug+'">'+
    	                                '<img width="300" height="300" src="'+data.data.products.prod_img+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">'+data.data.products.prod_name+'&nbsp</a>'+
    	                            '<span class="quantity">'+data.data.amount+' × <span class="woocommerce-Price-amount amount">'+formatNumber(data.data.products.prod_price_sale)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>'+
    	                        '</li>');
    	                        $('#list_cart_right').prepend('<li class="mini_cart_item">'+
                                '<a href="#" class="remove remove-'+data.data.id+'" title="Xóa sản phẩm này" data-id="'+data.data.id+'">×</a>'+
                                '<a href="'+url+'product/'+data.data.products.prod_slug+'">'+
                                    '<img width="300" height="300" src="'+data.data.products.prod_img+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" >'+data.data.products.prod_name+'&nbsp; </a>'+
                                '<span class="quantity">'+data.data.amount+' × <span class="woocommerce-Price-amount amount">'+formatNumber(data.data.products.prod_price_sale)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>'+
                            '</li>');
                            } else {
                            	$('.remove-'+data.data.id).parent().replaceWith('<li class="mini_cart_item">'+
    	                            '<a href="#" style="line-height:1;" class="remove remove-'+data.data.id+'" title="Xóa sản phẩm này" data-id="'+data.data.id+'">×</a>'+
    	                            '<a href="'+url+'product/'+data.data.products.prod_slug+'">'+
    	                                '<img width="300" height="300" src="'+data.data.products.prod_img+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">'+data.data.products.prod_name+'&nbsp</a>'+
    	                            '<span class="quantity">'+data.data.amount+' × <span class="woocommerce-Price-amount amount">'+formatNumber(data.data.products.prod_price_sale)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>'+
    	                        '</li>');
    	                        $('.remove-'+data.data.id).parent().replaceWith('<li class="mini_cart_item">'+
                                '<a href="#" class="remove remove-'+data.data.id+'" title="Xóa sản phẩm này" data-id="'+data.data.id+'">×</a>'+
                                '<a href="'+url+'product/'+data.data.products.prod_slug+'">'+
                                    '<img width="300" height="300" src="'+data.data.products.prod_img+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" >'+data.data.products.prod_name+'&nbsp; </a>'+
                                '<span class="quantity">'+data.data.amount+' × <span class="woocommerce-Price-amount amount">'+formatNumber(data.data.products.prod_price_sale)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>'+
                            '</li>');
                            }
                            
                            $('#cart_id_none .empty').remove();
                            $('#list_cart_right .empty').remove();
                            $("#fancybox_id").css('display', 'block');
                            $('html').css('overflow', 'hidden');
                            $('.buttons').show();
                        	$('.total').show();
                        }
                    }
                });
            }
        });

        // Xóa sản phẩm khỏi giỏ hàng
        $('#cart_id_none, #list_cart_right').on('click', '.remove', function(e){
            var id = $(this).data('id');
            var rm = '.remove-'+id;
            var user_id = $('#user_id').val();
            // console.log(id, rm);
            $(rm).parent().remove();
            $.ajax({
                url: url+'deltocart',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: {
                    id:id,
                    user_id: user_id
                },
                success: function(data) {
                    // console.log(data.message.code);
                    if(data.message.code == 200) {
                    	$('#pr_count').text(data.count);
                    	$('.total_price').text(data.total);
                        if(data.count == 0) {
                        	$('#pr_count').text(0);
                        	$('#cart_id_none').prepend('<li class="empty">Chưa có sản phẩm trong giỏ hàng.</li>');
                    		$('#list_cart_right').prepend('<li class="empty">Chưa có sản phẩm trong giỏ hàng.</li>');
                        	$('.buttons').hide();
                    		$('.total').hide();
                        }
                    }
                }
            });
        });

        // khác
        $("#fancybox_id").click(function() {
	        $(this).css('display', 'none');
	        $('html').css('overflow', 'inherit');
	    });
	    $(".close").click(function() {
	        $("#fancybox_id").css('display', 'none');
	        $('html').css('overflow', 'inherit');
	    });

	    // view click
        viewClick('product_id', 'product');
        viewClick('category_id', 'category');
        viewClick('news_id', 'news');
        viewClick('videos_id', 'videos');

        // Chỉnh màu new
        // $('.menu_header_wrap,  h3.title-sidebar, .devvn_mega_menu_title h2:before, .devvn_mega_menu_image h2:before, .cart_floating_right_button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .show_phone_mobile, .section_cvp_title h3, .section_cvp_title h2, .woocommerce span.onsale, .woocommerce ul.products li.product .onsale, .paginate_links .current, .paginate_links .page-numbers:hover, .nav-links a:hover, a.read_more:hover, .cart_after_content_title h2, a.checkout-button.button.alt.wc-forward, .woocommerce a.remove:hover, .cart_floating_right_title').css('background', 'yellow');
    	
    	// Xóa sản phẩm trong trang giỏ hàng
    	$('.cart-remove').click(function() {
    		var id = $(this).data('id');
           	swal({
                title: "Are you sure?",
                text: "Nếu xóa, Bạn sẽ không thể khôi phục dữ liệu này!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
		                url: url+'deltocart',
		                headers: {
		                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                },
		                type: 'POST',
		                data: {
		                    id:id,
		                    user_id: 2
		                },
                        success: function(){
                            swal("Dữ liệu đã được xóa thành công", {
                              icon: "success",
                            }).then(()=>{
                                location.reload();
                                
                            });
                        }
                    });
                    
                } else {
                    swal("Bạn đã hủy thao tác xóa");
                }
            });
        });

        // show giá khi thay đổi số lượng của trang giỏ hàng
        $('.number_change').change(function() {
            var val = $(this).val();
            var price = $(this).data('price');
            var id = $(this).data('id');
            $('.show-price-'+id).html(formatNumber(price*val)+'&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span>');
            // console.log(val, formatNumber(price*val));
        });

        // Hàm chỉnh popup thêm vào giỏ hàng khi thay đổi kích thước màn hình
        var height_n = $(window).height();
        var weight_n = $(window).width();
        changePopup(height_n, weight_n);
         $(window).resize(function() {
            var height_c = $(window).height();
            var weight_c = $(window).width();
            // console.log(height_c, weight_c);
            changePopup(height_c, weight_c);
         });
    });

    // Hàm thay đổi kích thước popup thêm giỏ hàng
    function changePopup(height, weight) {
        // if(weight>=900) {
        //     $('.fancybox-wrap').css({'weight':'inherit', 'padding':'inherit'})
        // }
        // if(weight<900) {
        //     $('.fancybox-wrap').css({'weight':'100% !important', 'left':'0', 'padding':'20px'})
        // }
    } 

    // view sản phẩm, video, bài viết, danh mục    
    function viewClick(nameClass, type) {
        $('.'+nameClass).click(function() {
            var id = $(this).data('id');
            addView(id, type);
        });
    }
    function addView(id, type) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url+'view',
            type: 'POST',
            data: {
                other_id:id,
                'type':type
            },
            success: function(data) {
                // console.log(data)
                console.log('Click đã được thêm thành công!')
            }
        });
    }

    // Hàm format định dạng tiền
    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
})(jQuery);
