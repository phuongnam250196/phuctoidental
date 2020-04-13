@extends('backend.layout')
@section('title', 'Cấu hình khác')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Cài đặt</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/setting')}}">Cài đặt</a></li>
                            <li class="breadcrumb-item active">Cấu hình khác</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Important!</h4>
                    <p>{{session('message')}}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a href="{{url('admin/setting/other')}}" class="btn btn-primary">Cấu hình khác</a>
                    <a href="{{url('admin/setting/slider')}}" class="btn btn-primary">Slider</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <form action="{{url('admin/setting/other')}}" method="POST" enctype="multipart/form-data">
                            <div class="card-header">
                                <h3><i class="fa fa-file-text-o"></i> Cấu hình khác</h3>
                            </div>
                            <!-- end card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Số điện thoại</label>
                                        <input type="number" class="form-control" name="web_phone" placeholder="VD: 0978 987 166" @if(!empty($setting)) value="{{$setting->phone}}" @else value="{{old('web_phone')}}" @endif>
                                        @if($errors->has('web_phone'))
                                            <p class="help text-danger">{{ $errors->first('web_phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="web_email" placeholder="VD: test@gmail.com" @if(!empty($setting)) value="{{$setting->email}}" @else value="{{old('web_email')}}" @endif>
                                        @if($errors->has('web_email'))
                                            <p class="help text-danger">{{ $errors->first('web_email') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" name="web_address" placeholder="Xã yên bình, Huyện Vĩnh Tường, Tỉnh Vĩnh Phúc" @if(!empty($setting)) value="{{$setting->address}}" @else value="{{old('web_address')}}"  @endif>
                                        @if($errors->has('web_address'))
                                            <p class="help text-danger">{{ $errors->first('web_address') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Facebook page</label>
                                        <input type="text" class="form-control" name="web_facebook_page" placeholder="https://www.facebook.com/pikeweb" @if(!empty($setting)) value="{{$setting->fanpage_id}}" @else value="{{old('web_facebook_page')}}"  @endif>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Twitter page</label>
                                        <input type="text" class="form-control" name="web_twitter_page" placeholder="" @if(!empty($setting)) value="{{$setting->twitter_id}}" @else value="{{old('web_twitter_page')}}"  @endif>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Skype id</label>
                                        <input type="text" class="form-control" name="web_skype_id" placeholder="" @if(!empty($setting)) value="{{$setting->skype_id}}" @else value="{{old('web_skype_id')}}"  @endif>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Google Maps API KEY</label>
                                        <input type="password" class="form-control" name="web_google_maps_api_key" value="xxxxxxxxxxxxxx>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Footer HTML content</label>
                                    <textarea rows="3" class="form-control editor" name="web_footer_content" placeholder="(c) Copyright 2017 Pike Web Development">@if(!empty($setting)) {!!$setting->footer_content!!} @else {!! old('web_footer_content') !!}  @endif</textarea>
                                    @if($errors->has('web_footer_content'))
                                        <p class="help text-danger">{{ $errors->first('web_footer_content') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Analytics code</label>
                                    <textarea rows="4" class="form-control" name="web_analytics_code">@if(!empty($setting)) {{$setting->Analytics_code}} @else {{old('web_analytics_code')}} @endif</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label>Thay đổi logo</label><br />
                                    <input id="img" type="file" name="logo" class="form-control" style="display: none" onchange="changeImg(this)" @if(!empty($seo)) value="{{$setting->logo}}" @else value="{{old('logo')}}" @endif>
                                    @if(!empty($setting->logo))
                                        <img id="avatar" class="thumbnail" src="{{url('/'.$setting->logo)}}">
                                    @else
                                        <img id="avatar" class="thumbnail" src="{{url('/images/new_seo-10-512.png')}}" width="150">
                                    @endif
                                    @if($errors->has('logo'))
                                        <p class="help text-danger">{{ $errors->first('logo') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Change color (mặc định: <span style="color:#e03232">#e03232</span>)</label><br />
                                    <input type="color" name="color" @if(!empty($setting)) value="{{$setting->color}}" @else value="{{old('color')}}"  @endif style="height: 50px; width: 100px;">
                                    @if($errors->has('color'))
                                        <p class="help text-danger">{{ $errors->first('color') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                </div>
                            </div>
                            {{csrf_field()}}
                            <!-- end card-body -->
                        </form>
                    </div>
                    <!-- end card -->
                 
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
@endsection