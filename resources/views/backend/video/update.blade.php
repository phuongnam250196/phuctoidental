@extends('backend.layout')
@section('title', 'Cập nhật video')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Cập nhật video</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item">Video</li>
                            <li class="breadcrumb-item active">Cập nhật</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
           
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-sitemap"></i> Nhập thông tin sản phẩm</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs">
							  	<li class="nav-item">
							    	<a class="nav-link active" data-toggle="tab" href="#product_tab_2">Mô tả & nội dung</a>
							  	</li>
							  	<li class="nav-item">
							    	<a class="nav-link" data-toggle="tab" href="#product_tab_3">SEO</a>
							  	</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content product_tab_content">
							  	<div class="tab-pane container active" id="product_tab_2">
							  		<form method="POST" enctype="multipart/form-data">
							  			<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Tiêu đề</div>
										  	<div class="product_d_flex_input">
												<select class="form-control" name="cate_id" id="sel1">
												    <option value="">Chọn loại sản phẩm</option>
												    {{showCategories($category, $data->cate_id)}}
											  	</select>
										  	</div>
										</div>
							  			<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Tiêu đề</div>
										  	<div class="product_d_flex_input">
												<input type="text" name="video_name" value="{{$data->video_name}}" class="form-control" placeholder="VD: Bán hàng online">
												@if($errors->has('video_name'))
                                                    <p class="help text-danger">{{ $errors->first('video_name') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Ảnh thumnail</div>
										  	<div class="product_d_flex_input">
												<input id="img" type="file" name="video_img" class="form-control" style="display: none" onchange="changeImg(this)" value="{{$data->video_img}}">
		                                        <img id="avatar" class="thumbnail" src="{{url('/'.$data->video_img)}}" width="150">@if($errors->has('video_img'))
                                                    <p class="help text-danger">{{ $errors->first('video_img') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Link video</div>
										  	<div class="product_d_flex_input">
												<input type="text" name="video_url" value="{{$data->video_url}}" class="form-control">
												@if($errors->has('video_url'))
                                                    <p class="help text-danger">{{ $errors->first('video_url') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Mô tả ngắn</div>
										  	<div class="product_d_flex_input">
												<textarea name="video_description" class="form-control" cols="30" rows="5">{{$data->video_description}}</textarea>
												@if($errors->has('video_description'))
                                                    <p class="help text-danger">{{ $errors->first('video_description') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Nội dung</div>
										  	<div class="product_d_flex_input">
												<textarea name="video_content" class="form-control" id="video_content" cols="30" rows="4">{{$data->video_content}}</textarea>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Trạng thái</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="video_status" value="1" @if(!empty($data->video_status)) checked @endif> <span>Ẩn bài viết</span>
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
										{{csrf_field()}}
							  		</form>
							  	</div>
							  	<div class="tab-pane container fade" id="product_tab_3">
							  		<form action="">
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
										{{csrf_field()}}
							  		</form>
							  	</div>
							</div>
                        </div>
                    </div>
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
					        <style>
					        	#upload_img {
					        		position: relative;
					        	}
					        	#upload_img_box {
					        		text-align: center;
					        		padding: 25px;
					        		border: 2px dashed #C8CBCE;
					        		color: #97A1A8;
					        		cursor: pointer;
					        		position: relative;
					        		z-index: 998;
					        	}
					        	.jFiler-input-text h3 {
					        		font-size: 16px;
					        		margin-bottom: 0;
					        	}
					        	.jFiler-input-choose-btn {
					        		color: white !important;
					        	}
					        	#prod_img {
					        		position: absolute;
					        		top: 0;
					        		z-index: -999999999999;
					        		left: 0;
					        	}
					        </style>
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
        CKEDITOR.replace( 'video_content', {
            filebrowserBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    </script>
@endsection