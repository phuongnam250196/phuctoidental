@extends('backend.layout')
@section('title', 'Đơn hàng')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Đơn hàng</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            {{-- <span class="pull-right"><a href="{{url('admin/post/add')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a></span> --}}
                            <h3><i class="fa fa-sitemap"></i> Danh sách đơn hàng</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="20">STT</th>
                                        <th>Người mua</th>
                                        <th width="300">Sản phẩm</th>
                                        <th>Tổng giá</th>
                                        <th>Ngày đặt hàng</th>
                                        <th style="width:120px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=>$dat)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$dat->users->name}}</td>
                                        <td>
                                            @foreach($dat->orders as $key=>$order)
                                                <p><strong>{{$order->products->prod_name}}</strong>x{{$order->amount}} <br>{{number_format($order->price, 0, '.', '.')}} vnđ</p>
                                            @endforeach
                                        </td>
                                        <td>{{number_format($dat->total_price, 0, '.', '.')}} vnđ</td>
                                        <td>{{$dat->created_at}}</td>
                                        <td>
                                            {{-- <a href="{{url('admin/post/update/'.$dat->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-reply" aria-hidden="true"></i></a> --}}
                                            
                                            <button id="order_submit_{{$dat->id}}" data-id="{{$dat->id}}" class="btn btn-primary btn-sm order_submit"><i class="fa fa-truck" aria-hidden="true"></i></button>
                                            <button id="post_del_{{$dat->id}}" data-id="{{$dat->id}}" class="btn btn-danger btn-sm posts_del" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-remove" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{$data->links()}} --}}
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
            $('body').on('click', '.posts_del', function() {
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
                            url: '{{url("/")}}/admin/order/del',
                            data: {
                                "id": id
                            },
                            success: function(){
                                swal("Bạn đã đơn hàng xóa thành công", {
                                  icon: "success",
                                }).then(()=>{
                                    location.reload();
                                });
                            }
                        });
                    } else {
                        swal("Bạn đã hủy xóa đơn hàng");
                    }
                });
            });
            $('body').on('click', '.order_submit', function() {
                var id = $(this).data('id');
                swal({
                    title: "Xác nhận đơn hàng?",
                    text: "Bạn chắc chắn đã giao đơn hàng thành công!",
                    icon: "success",
                    buttons: true,
                    successMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            url: '{{url("/")}}/admin/order/confirm',
                            data: {
                                "id": id
                            },
                            success: function(){
                                swal("Bạn đã xác nhận giao hàng thành công", {
                                    icon: "success",
                                }).then(()=>{
                                    location.reload();
                                });
                            }
                        });
                    } else {
                        swal("Bạn đã hủy xác nhận đơn hàng!");
                    }
                });
            });
        });
    </script>
@endsection