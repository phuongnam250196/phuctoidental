@extends('backend.layout')
@section('title', 'Liên hệ')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Liên hệ</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item active">Liên hệ</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            {{-- <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Important!</h4>
                <p>This section is available in Pike Admin PRO version.</p>
            </div> --}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-envelope-o"></i> All contact messages (2 messages)</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Message details</th>
                                        <th style="width:350px">Sender details</th>
                                        <th style="width:120px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$dat)
                                    <tr>
                                        <td>
                                            <a href="pro-contact-messages-details.html"><b>Nội dung</b></a>
                                            <p>{{$dat->message}}</p>
                                        </td>
                                        <td>
                                            {{$dat->name}}<br />
                                            {{$dat->email}}<br />
                                            IP: 79.112.97.75 
                                        </td>
                                        <td>
                                            <a href="pro-contact-messages-details.html" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-title="Read message"><i class="fa fa-search" aria-hidden="true"></i></a>
                                            <button id="post_del_{{$dat->id}}" data-id="{{$dat->id}}" class="btn btn-danger btn-sm posts_del" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$data->links()}}
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
                        $.ajax({
                            type: "POST",
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            url: '{{url("/")}}/admin/contact/del',
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