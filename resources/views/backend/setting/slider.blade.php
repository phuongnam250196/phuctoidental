@extends('backend.layout')
@section('title', 'Slider')
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
                            <li class="breadcrumb-item active">Slider</li>
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
                    <!-- end card -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <span class="pull-right"><a href="{{url('admin/setting/slider/add')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add new slide image</a></span>
                            <h3><i class="fa fa-image"></i> Slider (3 images)</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="width:20px">#</td>
                                            <td style="width:150px">Image</td>
                                            <td>Slide details</td>
                                            <td style="width:100px">Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key=>$dat)
                                        <tr>
                                            <th>{{++$key}}</th>
                                            <td>
                                                <span style="float: left; margin-right:10px;"><img alt="image" class="img-fluid" style="max-width:150px; height:auto;" src="{{url('/'.$dat->image)}}" /></span>
                                            </td>
                                            <td>
                                                <h4>{{$dat->title}}</h4>
                                                URl: <a target="_blank" href="{{$dat->link}}">{{$dat->link}}</a>
                                            </td>
                                            <td>
                                                <a href="{{url('admin/setting/slider/update/'.$dat->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                
                                                <button id="post_del_{{$dat->id}}" data-id="{{$dat->id}}" class="btn btn-danger btn-sm posts_del" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    <script>
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
                console.log(id);
                        $.ajax({
                            type: "POST",
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            url: '{{url("/")}}/admin/setting/slider/del',
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
    </script>
@endsection