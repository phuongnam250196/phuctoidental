@extends('backend.layout')
@section('title', 'Sản phẩm')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Products</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            @if(session('messages'))
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Important!</h4>
                    <p>{{session('messages')}}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <span class="pull-right"><a href="{{url('admin/product/add')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add new product</a></span>
                            <h3><i class="fa fa-sitemap"></i> Tất cả sản phẩm trang hiện tại ({{count($data)}} sản phẩm)</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th style="width:120px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$dat)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><img src="{{url(''.$dat->prod_img)}}" width="100" alt=""></td>
                                        <td>{{$dat->prod_name}}</td>
                                        <td>{{number_format($dat->prod_price, 0,'.','.')}} VND</td>
                                        <td>
                                            <a href="{{url('admin/product/update/'.$dat->id)}}" class="btn btn-primary btn-sm" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <button id="post_del_{{$dat->id}}" data-id="{{$dat->id}}" class="posts_del btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end card-body -->
                    </div>
                    {{$data->links()}}
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
                        $.ajax({
                            type: "POST",
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            url: '{{url("/")}}/admin/product/del',
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