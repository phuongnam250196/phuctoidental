@extends('backend.layout')
@section('title', 'Cập nhật sản phẩm')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Cập nhât sản phẩm</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item">Sản phẩm</li>
                            <li class="breadcrumb-item active">Cập nhật</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        	<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
                	<form method="POST" enctype="multipart/form-data">
	                    <div class="card mb-3">
	                        <div class="card-header">
	                            <h3><i class="fa fa-sitemap"></i> Nhập thông tin sản phẩm</h3>
	                        </div>
	                        <div class="card-body">
	                            <ul class="nav nav-tabs">
								  	<li class="nav-item">
								    	<a class="nav-link active" data-toggle="tab" href="#product_tab_1">Thông tin</a>
								  	</li>
								  	<li class="nav-item">
								    	<a class="nav-link" data-toggle="tab" href="#product_tab_2">Mô tả & nội dung</a>
								  	</li>
								  	<li class="nav-item">
								    	<a class="nav-link" data-toggle="tab" href="#product_tab_3">SEO</a>
								  	</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content product_tab_content">
								  	<div class="tab-pane container active" id="product_tab_1">
								  		<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Tên sản phẩm</div>
										  	<div class="product_d_flex_input">
												<input type="text" class="form-control" name="prod_name" value="{{$data->prod_name}}" placeholder="VD: Iphone 6 plus">
												@if($errors->has('prod_name'))
                                                    <p class="help text-danger">{{ $errors->first('prod_name') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Ảnh sản phẩm</div>
										  	<div class="product_d_flex_input">
												<input id="img" type="file" name="video_img" class="form-control" style="display: none" onchange="changeImg(this)" value="{{$data->prod_img}}">
		                                        <img id="avatar" class="thumbnail" src="{{url('/'.$data->prod_img)}}" width="150">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Thư viện ảnh</div>
										  	<div class="product_d_flex_input">
												<input type="file" class="form-control" name="prod_gallery[]" value="{{$data->prod_gallery}}" multiple id="gallery-photo-add">
										  		{{-- <input type="file" class="form-control" name="prod_gallery[]" multiple id="gallery-photo-add"> --}}
										  		@if($errors->has('prod_gallery'))
                                                    <p class="help text-danger">{{ $errors->first('prod_gallery') }}</p>
                                                @endif
												
										  	</div>
										  	<style>
										  		.gallery img {
										  			width: 90px;
										  			height: 90px;
										  			margin-left: 10px;
										  		}
										  	</style>
										</div>
										<div class="d-flex product_d_flex">
											<div class="product_d_flex_title  align-self-center"></div>
										  	<div class="product_d_flex_input">
										  		<div class="gallery">
										  			<?php
										  				$gars = explode("|", $data->prod_gallery); 
										  			?>
										  			@foreach($gars as $g)
										  				<img class="img_preview" src="{{url('/'.$g)}}" alt="">
										  			@endforeach
										  		</div>
										  	</div>
										</div>
										<script>
											$(function() {
											    var imagesPreview = function(input, placeToInsertImagePreview) {
											        if (input.files) {
											            var filesAmount = input.files.length;
											            for (i = 0; i < filesAmount; i++) {
											                var reader = new FileReader();
											                reader.onload = function(event) {
											                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
											                }
											                reader.readAsDataURL(input.files[i]);
											            }
											        }
											    };
											    $('#gallery-photo-add').on('change', function() {
											        imagesPreview(this, 'div.gallery');
											        $('.img_preview').css('display', 'none');
											    });
											});
										</script>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Giá bán</div>
										  	<div class="product_d_flex_input">
												<div class="input-group">
												    <input type="number" class="form-control" name="prod_price" value="{{$data->prod_price}}" placeholder="1.000.000">
												    <div class="input-group-append">
												      <span class="input-group-text">vnđ</span>
												    </div>
												</div>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Số lượng</div>
										  	<div class="product_d_flex_input">
												<input type="number" class="form-control" name="prod_amount" value="{{$data->prod_amount}}" placeholder="VD: 12">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Bảo hành</div>
										  	<div class="product_d_flex_input">
												<div class="input-group">
												    <input type="text" class="form-control" name="prod_guarantee" value="{{$data->prod_guarantee}}" placeholder="VD: 12 tháng">
												    <div class="input-group-append">
												      <span class="input-group-text"><a href="#"><i class="fa fa-gear bigfonts" aria-hidden="true"></i></a></span>
												    </div>
												</div>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Giảm giá</div>
										  	<div class="product_d_flex_input">
												<input type="text" class="form-control" name="prod_sale" value="{{$data->prod_sale}}" placeholder="VD: Giảm 12%">
										  	</div>
										</div>
										
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Đáng xem</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="prod_view" value="1" @if(!empty($data->prod_view)) checked @endif>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Hot</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="hot" value="1" @if(!empty($data->hot)) checked @endif>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Trả góp</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="installment" value="1" @if(!empty($data->installment)) checked @endif>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Loại sản phẩm</div>
										  	<div class="product_d_flex_input">
												<div class="form-group">
												  	<select class="form-control" name="cate_id">
												    	<option value="">Chọn loại sản phẩm</option>
												    	@foreach($category_not_child as $key=>$cate_n)
															<option value="{{$cate_n->id}}" @if($data->cate_id == $cate_n->id) selected @endif>{{$cate_n->cate_name}}</option>
														@endforeach
												  	</select>
												  	@if($errors->has('cate_id'))
                                                    	<p class="help text-danger">{{ $errors->first('cate_id') }}</p>
                                                	@endif
												</div>
										  	</div>
										</div>
										<?php 
											$tag=json_decode($data->tag_id);
										 ?>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Gắn tag</div>
										  	<div class="product_d_flex_input">
												<select class="form-control select2" id="example2" name="tag_id[]" multiple="multiple">
													{{-- @foreach($category as $key=>$cate)
														<option value="{{$cate->id}}">{{$cate->cate_name}}</option>
													@endforeach --}}
													@if(!empty($tag))
														@foreach($category as $key=>$cate)
															<option value="{{$cate->id}}" @if(in_array($cate->id, $tag)) selected @endif>{{$cate->cate_name}}</option>
														@endforeach
													@endif
												</select>
										  	</div>
										</div>
								  	</div>
								  	<div class="tab-pane container fade" id="product_tab_2">
								  		<div class="form-group product_group">
										  	<label for="usr">Mô tả ngắn (seo)</label>
										  	<textarea name="prod_description" class="form-control" cols="30" rows="5">{!! $data->prod_description !!}</textarea>
												@if($errors->has('prod_description'))
                                                    <p class="help text-danger">{{ $errors->first('prod_description') }}</p>
                                                @endif
										</div>
								  		<div class="form-group product_group">
										  	<label for="usr">Mô tả ngắn</label>
										  	<textarea name="prod_short_description" class="form-control" id="editor72" cols="30" rows="2">{!! $data->prod_short_description !!}</textarea>
										  	
										</div>
										<div class="form-group product_group">
										  	<label for="usr">Nội dung</label>
										  	<textarea name="prod_content" class="form-control" id="editor73" cols="30" rows="4">{!! $data->prod_content !!}</textarea>
										</div>
								  	</div>
								  	<div class="tab-pane container fade" id="product_tab_3">
								  		{{-- <form action=""> --}}
							  			<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Tiêu đề</div>
										  	<div class="product_d_flex_input">
												<input type="text" class="form-control" value="{{!empty($seo->title)?$seo->title:''}}" name="title">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Tác giả</div>
										  	<div class="product_d_flex_input">
												<input type="text" class="form-control" value="{{!empty($seo->author)?$seo->author:''}}" name="author">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Từ khóa liên quan</div>
										  	<div class="product_d_flex_input">
												<input type="text" class="form-control" value="{{!empty($seo->keyword)?$seo->keyword:''}}" name="keywords">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
											  	<div class="product_d_flex_title  align-self-center">Mô tả ngắn</div>
											  	<div class="product_d_flex_input">
													<textarea name="description" class="form-control" cols="30" rows="5">{{!empty($seo->description)?$seo->description:''}}</textarea>
											  	</div>
											</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Ảnh thump</div>
										  	<div class="product_d_flex_input">
												 <img class="thumbnail" src="@if(!empty($seo->image)) {{url('/'.$seo->image)}} @else # @endif" width="150">
										  	</div>
										</div>
										<br>
										<br>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center"></div>
										  	<div class="product_d_flex_input">
												<button class="btn btn-primary">Cập nhật</button>
												<a href="{{url('admin/video')}}" class="btn btn-secondary">Hủy bỏ</a>
										  	</div>
										</div>
										{{-- {{csrf_field()}}
							  		</form> --}}
										
								  	</div>
								</div>
	                        </div>
	                    </div>
	                    <div class="btn_up">
			            	<button type="submit" class="btn btn-primary">Cập nhật</button>
			            	<a href="{{url('admin/product')}}" class="btn btn-secondary">Hủy bỏ</a>
			            </div>
			            <style>
			            	.btn_up {
							    position: fixed;
							    bottom: 15px;
							    z-index: 9;
							}
			            </style>
			            {{csrf_field()}}
		            </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-sitemap"></i> Chọn ảnh sản phẩm</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" id="sitelogo">
					            <div class="form-group">
							            <input type="file" id="prod_img" name="prod_img" />
					            	<div id="upload_img">
							            <div id="upload_img_box">
							            	<div class="jFiler-input-inner">
								        		<div class="jFiler-input-icon"><i class="fa fa-cloud-upload fa-3x	" aria-hidden="true"></i></div>
								        		<div class="jFiler-input-text">
								        			<h3>Drag &amp; Drop files here</h3> 
								        			<span style="display:inline-block; margin: 5px 0">or</span>
								        		</div>
								        		<a class="jFiler-input-choose-btn btn btn-custom">Browse Files</a>
								        	</div>
								        </div>
							        </div>
					            </div>
					            <div class="form-group">
					              <img id="myImg" src="{{url('/')}}/pike/assets/images/cusomize/none_im.jpg" style="max-width: 500px;max-height: 400px;width: 100%;">            
					            </div>
				          	</form>
				          	<script type="text/javascript">
						   		$('#upload_img').click(function() {
						   			$("#prod_img").trigger('click');
						   		})
								$("#prod_img").change(function () {
								    $.ajax({
								      url:"{{url('/')}}/admin/product/upload",
								       headers: {
								         'X-CSRF-TOKEN': "{{csrf_token()}}"
								         },
								      data:new FormData($("#sitelogo")[0]),
								      method:"POST",
								      processData: false,
								      contentType: false,
								      success:function(data){  
								      	console.log(data);
								      	$('#myImg').attr('src', '../../'+data.data.prod_img)
								      },
								      error:function(error){
								          console.log(error);
								      }
								   });
								});
							</script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
@endsection

@section('add_script')
	<script>
        CKEDITOR.replace( 'editor72', {
            filebrowserBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );

        CKEDITOR.replace( 'editor73', {
            filebrowserBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    </script>
@endsection