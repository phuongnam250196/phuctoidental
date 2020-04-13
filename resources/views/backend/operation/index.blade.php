@extends('backend.layout')
@section('title', 'Tin tức')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Tin tức</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item active">Tin tức</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            {{-- <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Important!</h4>
                <p>This section is available in Pike Admin PRO version.</p>
            </div> --}}
            @if(session('messages'))
                <p class="alert alert-success">{{session('messages')}}</p>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-sitemap"></i> Danh sách tin tức</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <form action="{{url('/admin/operation/add_month')}}" method="POST" enctype="multipart/form-data">
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Nhập tháng</div>
                                    <div class="product_d_flex_input">
                                        <div class="form-group">
                                            <select class="form-control" name="month_name" disabled="">
                                                <!-- <option value="">Chọn tháng</option>
                                                <option value="1">Tháng 1</option>
                                                <option value="2">Tháng 2</option>
                                                <option value="3">Tháng 3</option>
                                                <option value="4">Tháng 4</option>
                                                <option value="5">Tháng 5</option>
                                                <option value="6">Tháng 6</option>
                                                <option value="7">Tháng 7</option>
                                                <option value="8">Tháng 8</option>
                                                <option value="9">Tháng 9</option>
                                                <option value="10">Tháng 10</option>
                                                <option value="11">Tháng 11</option> -->
                                                <option value="12">Tháng {{$mth}}</option>
                                            </select>
                                            @if($errors->has('month_name'))
                                                <p class="help text-danger">{{ $errors->first('month_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Tiền điện</div>
                                    <div class="product_d_flex_input">
                                        <input type="number" name="electricity" value="{{old('electricity')}}" class="form-control" placeholder="VD: Nhập tiền điện" >
                                        @if($errors->has('electricity'))
                                            <p class="help text-danger">{{ $errors->first('electricity') }}</p>
                                        @endif 
                                    </div>
                                </div>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Tiền nước</div>
                                    <div class="product_d_flex_input">
                                        <input type="number" name="water" value="{{old('water')}}" class="form-control" placeholder="VD: Nhập tiền nước" >
                                        @if($errors->has('water'))
                                            <p class="help text-danger">{{ $errors->first('water') }}</p>
                                        @endif 
                                    </div>
                                </div>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Tiền mạng</div>
                                    <div class="product_d_flex_input">
                                        <input type="number" name="network" value="{{old('network')}}" class="form-control" placeholder="VD: Nhập tiền mạng" >
                                        @if($errors->has('network'))
                                            <p class="help text-danger">{{ $errors->first('network') }}</p>
                                        @endif 
                                    </div>
                                </div>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Ảnh tiền điện</div>
                                    <div class="product_d_flex_input">
                                        <input type="file" name="image_dien" value="{{old('image_dien')}}" class="form-control" placeholder="VD: Nhập tiền mạng" >
                                        @if($errors->has('image_dien'))
                                            <p class="help text-danger">{{ $errors->first('image_dien') }}</p>
                                        @endif 
                                    </div>
                                </div>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Ảnh tiền nước</div>
                                    <div class="product_d_flex_input">
                                        <input type="file" name="image_nuoc" value="{{old('image_nuoc')}}" class="form-control" placeholder="VD: Nhập tiền mạng" >
                                        @if($errors->has('image_nuoc'))
                                            <p class="help text-danger">{{ $errors->first('image_nuoc') }}</p>
                                        @endif 
                                    </div>
                                </div>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center">Ảnh tiền mạng</div>
                                    <div class="product_d_flex_input">
                                        <input type="file" name="image_mang" value="{{old('image_mang')}}" class="form-control" placeholder="VD: Nhập tiền mạng" >
                                        @if($errors->has('image_mang'))
                                            <p class="help text-danger">{{ $errors->first('image_mang') }}</p>
                                        @endif 
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_title  align-self-center"></div>
                                    <div class="product_d_flex_input">
                                        <button class="btn btn-primary" >Cập nhật</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                    <div class="card mb-3">
                        <div class="card-header">
                            <span class="pull-right"><a href="{{url('admin/operation/total')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tinh tiền</a></span>
                            <h3><i class="fa fa-sitemap"></i> Danh sách phòng</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="20">STT</th>
                                        <th>Ảnh</th>
                                        <th>Phòng</th>
                                        <th>Ngày tạo</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($rooms))
                                    @foreach($rooms as $key=>$room)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><img width="50" height="50" src="https://pbs.twimg.com/profile_images/444021655728570368/9hfWajWG_400x400.jpeg"></td>
                                        <td><a href="#">{{ $room->room_name }}</a></td>
                                        <td><a href="#">{{ $room->created_at }}</a></td>
                                        <td>
                                            <a href="{{ url('admin/operation/edit_room/'.$room->id) }}" class="btn btn-primary">Nhập</a>
                                            <a href="" class="btn btn-info ml-2">Xem</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
   <!--  <script>
        $(document).ready(function(){
            $('.posts_del').click(function() {
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
                            type: "POST",
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            url: '{{url("/")}}/admin/post/del',
                            data: {
                                "id": id
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
        });
    </script> -->
@endsection