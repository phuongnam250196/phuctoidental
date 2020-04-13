@extends('backend.layout')
@section('title', 'Thêm mới sản phẩm')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Thêm mới sản phẩm</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Products</li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
           
            {{-- <form action="{{url('admin/product/add')}}" method="POST" enctype="multipart/form-data"> --}}
            	<div class="row">
	                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-xl-8">
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
												<input type="text" class="form-control" name="prod_name" value="{{old('prod_name')}}" placeholder="VD: Iphone 6 plus">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Giá bán</div>
										  	<div class="product_d_flex_input">
												<div class="input-group">
												    <input type="number" class="form-control" name="prod_price" value="{{old('prod_price')}}" placeholder="1.000.000">
												    <div class="input-group-append">
												      <span class="input-group-text">vnđ</span>
												    </div>
												</div>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Số lượng</div>
										  	<div class="product_d_flex_input">
												<input type="number" class="form-control" name="prod_amount" value="{{old('prod_amount')}}" placeholder="VD: 12">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Bảo hành</div>
										  	<div class="product_d_flex_input">
												<div class="input-group">
												    <input type="text" class="form-control" name="prod_guarantee" value="{{old('prod_guarantee')}}" placeholder="VD: 12 tháng">
												    <div class="input-group-append">
												      <span class="input-group-text"><a href="#"><i class="fa fa-gear bigfonts" aria-hidden="true"></i></a></span>
												    </div>
												</div>
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Giảm giá</div>
										  	<div class="product_d_flex_input">
												<input type="number" class="form-control" name="prod_sale" value="{{old('prod_sale')}}" placeholder="VD: 12 - Giảm 12%">
										  	</div>
										</div>
										{{-- <div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Gắn tag</div>
										  	<div class="product_d_flex_input">
												<select class="form-control select2" id="example2" name="tag_id[]" multiple="multiple">    
													<option value="AR">Argentina</option>
													<option value="AU">Australia</option>
													<option value="AT">Austria</option>
													<option value="BD">Bangladesh</option>
													<option value="BE">Belgium</option>
													<option value="BR">Brazil</option>
													<option value="BG">Bulgaria</option>
													<option value="CA">Canada</option>
													<option value="CN">China</option>
													<option value="CO">Colombia</option>
												</select>
										  	</div>
										</div> --}}
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Đáng xem</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="prod_view" value="1">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Hot</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="hot" value="1">
										  	</div>
										</div>
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Trả góp</div>
										  	<div class="product_d_flex_input">
												<input type="checkbox" name="	installment" value="1">
										  	</div>
										</div>
										
										<div class="d-flex product_d_flex">
										  	<div class="product_d_flex_title  align-self-center">Loại sản phẩm</div>
										  	<div class="product_d_flex_input">
												<div class="form-group">
												  <select class="form-control" id="sel1">
												    <option>Chọn loại sản phẩm</option>
												    <option>1</option>
												    <option>2</option>
												    <option>3</option>
												    <option>4</option>
												  </select>
												</div>
										  	</div>
										</div>
								  	</div>
								  	<div class="tab-pane container fade" id="product_tab_2">
								  		<div class="form-group product_group">
										  	<label for="usr">Mô tả ngắn</label>
										  	<textarea name="prod_short_description" class="form-control" id="editor72" cols="30" rows="2">{!! old('prod_short_description') !!}</textarea>
										  	
										</div>
										<div class="form-group product_group">
										  	<label for="usr">Nội dung</label>
										  	<textarea name="prod_content" class="form-control" id="editor73" cols="30" rows="4">{!! old('prod_content') !!}</textarea>
										</div>
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
	            <div class="btn_up">
	            	<button type="submit" class="btn btn-primary">Thêm mới</button>
	            	<a href="#" class="btn btn-secondary">Hủy bỏ</a>
	            </div>
            {{-- </form> --}}
            <style>
            	.btn_up {
				    position: fixed;
				    bottom: 15px;
				    z-index: 9;
				}
            </style>
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