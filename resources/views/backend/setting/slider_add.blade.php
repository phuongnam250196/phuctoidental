@extends('backend.layout')
@section('title', 'Thêm mới slider')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Thêm mới slider</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/seting')}}">Cài đặt</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/setting/slider')}}">Slider</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
           
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-xl-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-sitemap"></i> Nhập slider muốn thêm</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs">
							  	<li class="nav-item">
							    	<a class="nav-link active" data-toggle="tab" href="#product_tab_2">Slider</a>
							  	</li>
							  	<li class="nav-item">
							    	<a class="nav-link" data-toggle="tab" href="#product_tab_3">SEO</a>
							  	</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content product_tab_content">
							  	<div class="tab-pane container active" id="product_tab_2">
							  		<form action="{{url('/admin/setting/slider/add')}}" method="POST" enctype="multipart/form-data">
							  			<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Tiêu đề</div>
										  	<div class="product_d_flex_input">
												<input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="VD: Ảnh logo webiste">
												@if($errors->has('title'))
                                                    <p class="help text-danger">{{ $errors->first('title') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Link</div>
										  	<div class="product_d_flex_input">
												<input type="url" name="link" value="{{old('link')}}" class="form-control" placeholder="VD: https://vlnk.com.vn">
												@if($errors->has('link'))
                                                    <p class="help text-danger">{{ $errors->first('link') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Ảnh thumnail</div>
										  	<div class="product_d_flex_input">
												<input id="img" type="file" name="image" class="form-control" style="display: none" onchange="changeImg(this)" value="{{old('image')}}">
		                                        <img id="avatar" class="thumbnail" src="{{url('/images/new_seo-10-512.png')}}" width="150">
												@if($errors->has('image'))
                                                    <p class="help text-danger">{{ $errors->first('image') }}</p>
                                                @endif
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Trạng thái</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="status" value="1" value="{{old('status')}}"> <span>Ẩn / Hiện</span>
										  	</div>
										</div>
										<br>
										<br>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center"></div>
										  	<div class="product_d_flex_input">
												<button class="btn btn-primary">Thêm mới</button>
												<a href="{{url('admin/setting/slider')}}" class="btn btn-secondary">Hủy bỏ</a>
										  	</div>
										</div>
										{{csrf_field()}}
							  		</form>
							  	</div>
							  	<div class="tab-pane container fade" id="product_tab_3">
							  		<div class="d-flex product_d_flex">
									  	<div class="product_d_flex_title  align-self-center">Title</div>
									  	<div class="product_d_flex_input">
											<input type="text" class="form-control">
									  	</div>
									</div>
									<div class="d-flex product_d_flex">
									  	<div class="product_d_flex_title  align-self-center">Description</div>
									  	<div class="product_d_flex_input">
											<input type="text" class="form-control">
									  	</div>
									</div>
									<div class="d-flex product_d_flex">
									  	<div class="product_d_flex_title  align-self-center">Image</div>
									  	<div class="product_d_flex_input">
											<input type="text" class="form-control">
									  	</div>
									</div>
									<div class="d-flex product_d_flex">
									  	<div class="product_d_flex_title  align-self-center">Url</div>
									  	<div class="product_d_flex_input">
											<input type="text" class="form-control">
									  	</div>
									</div>
									<br>
									<br>
									
							  	</div>
							</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-4">
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