@extends('backend.layout')
@section('title', 'Cài đặt')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Cài đặt</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Cài đặt</li>
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
                        <form action="{{url('admin/setting/seo_index')}}" method="POST" enctype="multipart/form-data">
                            <div class="card-header">
                                <h3><i class="fa fa-file-text-o"></i> Cấu hình SEO thông tin website</h3>
                            </div>
                            <!-- end card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Site Title</label>
                                    <input class="form-control" name="site_title" type="text" placeholder="VD: Vật liệu nha khoa" @if(!empty($seo)) value="{{$seo->site_title}}" @else value="{{old('site_title')}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label>SEO meta image</label>
                                    <div class="clearfix"></div>
                                    <input id="img" type="file" name="image" class="form-control" style="display: none" onchange="changeImg(this)" @if(!empty($seo)) value="{{$seo->image}}" @else value="{{old('image')}}" @endif>
                                    @if(!empty($seo->image))
                                        <img id="avatar" class="thumbnail" src="{{url('/'.$seo->image)}}" width="150">
                                    @else
                                        <img id="avatar" class="thumbnail" src="{{url('/images/new_seo-10-512.png')}}" width="150">
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>SEO meta title</label>
                                        <input type="text" class="form-control" name="title" placeholder="VD: Vật liệu nha khoa - Giá rẻ" @if(!empty($seo)) value="{{$seo->title}}" @else value="{{old('title')}}" @endif>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>SEO meta site name</label>
                                        <input type="text" class="form-control" name="site_name" placeholder="VD: vatlieunhakhoa" @if(!empty($seo)) value="{{$seo->site_name}}" @else value="{{old('site_name')}}" @endif>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>SEO meta keywords</label>
                                        <input type="text" class="form-control" name="keyword" placeholder="VD: vật liệu, nha khoa, thiết bị,..." @if(!empty($seo)) value="{{$seo->keyword}}" @else value="{{old('keyword')}}" @endif>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>SEO meta author</label>
                                        <input type="text" class="form-control" name="author" placeholder="VD: TPN" @if(!empty($seo)) value="{{$seo->author}}" @else value="{{old('author')}}" @endif>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>SEO meta url</label>
                                        <input type="text" class="form-control" name="url" placeholder="VD: https://vlnk.com.vn" @if(!empty($seo)) value="{{$seo->url}}" @else value="{{old('url')}}" @endif>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>SEO meta description</label>
                                    <textarea rows="3" class="form-control editor" name="description" placeholder="VD: Đem lại những sản phẩm chất lượng cũng như tốt nhất cho đến cho bạn và khách hàng">@if(!empty($seo)) {{$seo->description}} @else {{old('description')}} @endif</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    <a href="{{url('admin')}}" class="btn btn-secondary">Huỷ bỏ</a>
                                </div>
                            </div>
                            {{csrf_field()}}
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