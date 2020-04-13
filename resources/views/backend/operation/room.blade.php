@extends('backend.layout')
@section('title', 'Thêm mới tiền phòng')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Thêm mới tiền phòng</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item">Tiền phòng</li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
           @if(session('messages'))
                <p class="alert alert-success">{{session('messages')}}</p>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-sitemap"></i> Nhập thông tin</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                            	<div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Chọn tháng</div>
                                    <div class="product_d_flex_input">
                                        <div class="form-group">
                                            <select class="form-control" name="month_id" readonly>
                                                @foreach($month_prices as $key=>$mp)
                                                	<option value="{{$mp->id}}">{{ $mp->month_name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('month_id'))
                                                <p class="help text-danger">{{ $errors->first('month_id') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center">Tên phòng</div>
								  	<div class="product_d_flex_input">
										<input type="text" class="form-control" value="{{ $room->room_name }}" readonly="">
								  	</div>
								</div>
								<div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center">Mã phòng</div>
								  	<div class="product_d_flex_input">
										<input type="text" class="form-control" value="{{ $room->room_code }}" readonly="">
								  	</div>
								</div>
								<div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center">Số đồng hồ tháng trước</div>
								  	<div class="product_d_flex_input">
                                        @if(!empty($room_lists))
										<input type="number" name="amount_last_month" value="{{$room->amount_last_month?$room->amount_last_month:$room_lists->amount_this_month}}" class="form-control" placeholder="VD: Nhập số">
                                        @else
                                        <input type="number" name="amount_last_month" value="{{$room->amount_last_month?$room->amount_last_month:old('amount_last_month')}}" class="form-control" placeholder="VD: Nhập số">
                                        @endif
								  	</div>
								</div>
								<div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center">Số đồng hồ tháng này</div>
								  	<div class="product_d_flex_input">
										<input type="number" name="amount_this_month" value="{{$room->amount_this_month?$room->amount_this_month:old('amount_this_month')}}" class="form-control" placeholder="VD: Nhập số">
										@if($errors->has('amount_this_month'))
                                            <p class="help text-danger">{{ $errors->first('amount_this_month') }}</p>
                                        @endif 
								  	</div>
								</div>
								<div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center">Số người</div>
								  	<div class="product_d_flex_input">
                                        @if(!empty($room_lists))
										<input type="number" name="amount_people" value="{{$room->amount_people?$room->amount_people:$room_lists->amount_people}}" class="form-control" placeholder="VD: Nhập số">
                                        @else
                                        <input type="number" name="amount_people" value="{{$room->amount_people?$room->amount_people:old('amount_people')}}" class="form-control" placeholder="VD: Nhập số">
                                        @endif
										@if($errors->has('amount_people'))
                                            <p class="help text-danger">{{ $errors->first('amount_people') }}</p>
                                        @endif 
								  	</div>
								</div>
								<div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center">Ảnh đồng hồ tháng trước</div>
								  	<div class="product_d_flex_input">
                                        @if(!empty($room_lists))
										<input id="img2" type="file" name="image_last_month" class="form-control" style="display: none" onchange="changeImg2(this)" value="{{$room->image_last_month?$room->image_last_month:$room_lists->image_this_month}}">
                                        <img id="avatar2" class="thumbnail" src="{{$room->image_last_month?url('/'.$room->image_last_month):url('/'.$room_lists->image_this_month)}}" width="150">
                                        @else
                                        <input id="img2" type="file" name="image_last_month" class="form-control" style="display: none" onchange="changeImg2(this)" value="{{$room->image_last_month?$room->image_last_month:old('image_this_month')}}">
                                        <img id="avatar2" class="thumbnail" src="{{$room->image_last_month?url('/'.$room->image_last_month):url('/images/new_seo-10-512.png')}}" width="150">
                                        @endif
								  	</div>
								</div>
								<div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center">Ảnh đồng hồ tháng này</div>
								  	<div class="product_d_flex_input">
										<input id="img" type="file" name="image_this_month" class="form-control" style="display: none" onchange="changeImg(this)" value="{{$room->image_this_month?$room->image_this_month:old('image_this_month')}}">
                                        <img id="avatar" class="thumbnail" src="{{$room->image_this_month?url('/'.$room->image_this_month):url('/images/new_seo-10-512.png')}}" width="150">
                                        @if($errors->has('image_this_month'))
                                            <p class="help text-danger">{{ $errors->first('image_this_month') }}</p>
                                        @endif 
								  	</div>
								</div>
								<br>
								<div class="d-flex product_d_flex">
								  	<div class="product_d_flex_title  align-self-center"></div>
								  	<div class="product_d_flex_input">
										<button class="btn btn-primary">Cập nhật</button>
										<a href="{{url('admin/operation/')}}" class="btn btn-secondary">Back</a>
								  	</div>
								</div>
								{{csrf_field()}}
					  		</form>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
    <style type="text/css">
    	.product_d_flex_title {
    		width: 300px;
    	}
    </style>
@endsection
@section('add_script')
	
@endsection