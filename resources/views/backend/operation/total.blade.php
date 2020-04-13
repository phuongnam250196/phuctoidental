@extends('backend.layout')
@section('title', 'Tính tiền')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Tinh tiền</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item active">Tính tiền</li>
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
                <div class="col-xs-12 col-sm-12 ">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-sitemap"></i> Tính tiền</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <br>
                                <div class="text-uppercase">
                                    <h3 class="text-center">Tổng tiền</h3>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex product_d_flex">
                                            <div class="product_d_flex_title  align-self-center">Tiền điện</div>
                                            <div class="product_d_flex_input">
                                                <input type="number" name="electricity" value="{{$month_price->electricity}}" class="form-control" placeholder="VD: Nhập tiền điện">
                                                @if($errors->has('electricity'))
                                                    <p class="help text-danger">{{ $errors->first('electricity') }}</p>
                                                @endif 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex product_d_flex">
                                            <div class="product_d_flex_title  align-self-center">Tiền nước</div>
                                            <div class="product_d_flex_input">
                                                <input type="number" name="water" value="{{$month_price->water}}" class="form-control" placeholder="VD: Nhập tiền nước">
                                                @if($errors->has('water'))
                                                    <p class="help text-danger">{{ $errors->first('water') }}</p>
                                                @endif 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex product_d_flex">
                                            <div class="product_d_flex_title  align-self-center">Tiền mạng</div>
                                            <div class="product_d_flex_input">
                                                <input type="number" name="network" value="{{$month_price->network}}" class="form-control" placeholder="VD: Nhập tiền mạng">
                                                @if($errors->has('network'))
                                                    <p class="help text-danger">{{ $errors->first('network') }}</p>
                                                @endif 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                @if(!empty($rooms))
                                <div class="text-uppercase">
                                    <h3 class="text-center">Số điện các phòng</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>STT</th>
                                            <th>Phòng</th>
                                            <th>Tiền điện</th>
                                            <th>Tiền nước</th>
                                            <th>Tiền mạng</th>
                                            <th>Tổng tiền</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rooms as $key=>$room)
                                                <tr>
                                                    <td>{{ $key+2 }}</td>
                                                    <td>{{ $room->room_name }}</td>
                                                    <td>{{ $room->room_electricity }}</td>
                                                    <td>{{ $room->room_water }}</td>
                                                    <td>{{ $room->room_network }}</td>
                                                    <td>{{ $room->room_electricity + $room->room_water + $room->room_network }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                </div>
                                @endif
                                
                                <br>
                                <div class="d-flex product_d_flex">
                                    <div class="product_d_flex_input">
                                        <button class="btn btn-primary" type="submit">Tính tiền</button>
                                        <a href="{{ url('admin/operation') }}">Back</a>
                                    </div>
                                </div>
                                {{csrf_field()}}
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
    <style type="text/css">
        .table {
            text-align: center;
        }
    </style>
@endsection