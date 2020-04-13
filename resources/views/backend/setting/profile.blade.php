@extends('backend.layout')
@section('title', 'Thông tin cá nhân')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Thông tin của tôi</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item active">Thông tin</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-user"></i> Profile details</h3>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Admin name</label>
                                                    <input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="VD: admin" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" name="email" type="email" placeholder="VD: admin@gmail.com" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Mật khẩu (Không thay đổi nếu ko update mật khẩu)</label>
                                                    <input class="form-control" name="password" type="password" value="" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Skype</label>
                                                    <input class="form-control" name="skype" type="text" placeholder="VD: phuongnam250196" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="button" class="btn btn-primary">Cập nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 border-left">
                                        <b>Latest activity</b>: Dec 06 2017, 22:23
                                        <br />
                                        <b>Register date: </b>: Nov 24 2017, 20:32
                                        <br />
                                        <b>Register IP: </b>: 123.456.789
                                        <div class="m-b-10"></div>
                                        <div id="avatar_image">
                                            <img alt="image" style="max-width:100px; height:auto;" src="{{url('/pike')}}/assets/images/avatars/admin.png" />
                                            <br />
                                            <i class="fa fa-trash-o fa-fw"></i> <a class="delete_image" href="#">Remove avatar</a>
                                        </div>
                                        <div id="image_deleted_text"></div>
                                        <div class="m-b-10"></div>
                                        <div class="form-group">
                                            <label>Change avatar</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
@endsection