@extends('backend.layout')
@section('title', 'Danh mục sản phẩm')
@section('main')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Categories</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            @if(session('message'))
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Important!</h4>
                    <p>This section is available in Pike Admin PRO version.</p>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <span class="pull-right"><button id="modal_add" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-plus" aria-hidden="true"></i> Add new category</button></span>
                            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modal_add_category">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new category</h5>
                                                <button type="button" id="modal_close" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Tên danh mục</label>
                                                            <input class="form-control" id="cate_name" name="title" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Ảnh</label>
                                                            <input class="form-control" id="cate_img" name="cate_img" type="file" />
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Mô tả ngắn</label>
                                                            <textarea class="form-control" id="cate_content" name="description" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Parent</label>
                                                            <select name="active" class="form-control" id="cate_parent">
                                                                <option value="">Chọn danh mục cha</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btn_add_cate" class="btn btn-primary">Add category</button>
                                                <input type="text" id="cate_id" hidden="">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    function listCateParent() {
                                        $.ajax({
                                            type: 'GET',
                                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                            url: '{{url('/')}}/admin/category/list_parent',
                                            data: {                         
                                                
                                            },
                                            success: function(data){
                                                var title = "";
                                                for(var i=0; i<data.length;i++) {
                                                    title += "<option value='"+data[i].id+"'>"+data[i].cate_name+"</option>";
                                                }
                                                $('#cate_parent').append(title)
                                            }
                                        });
                                    }
                                    function addUpdateCateDB(type) {
                                        $('#btn_add_cate').click(function() {
                                            var cate_id = $('#cate_id').val();
                                            var cate_name = $('#cate_name').val();
                                            var cate_content = $('#cate_content').val();
                                            var cate_parent = $('#cate_parent').val();
                                            $.ajax({
                                                type: "POST",
                                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                                url: '{{url('/')}}/admin/category/add',
                                                data: {
                                                    "id": cate_id,                         
                                                    "cate_name": cate_name,
                                                    "cate_content": cate_content,
                                                    "cate_parent": cate_parent,
                                                    "type": type
                                                },
                                                success: function(data){
                                                    console.log(data);
                                                    if(data.status == 1) {
                                                        if(data.messages.code=='200') {
                                                                var title = "";
                                                                if(data.data.name_cate_parent != null) {
                                                                    title = '<tr id="cate_tr_'+data.data.id+'">'
                                                                        +'<td><strong>'+data.data.cate_name+'</strong><br /><small>'+data.data.cate_content+'</small></td>'
                                                                        +'<td>'+data.data.name_cate_parent.cate_name+'</td>'
                                                                        +'<td>'+
                                                                            '<button data-id="'+data.data.id+'" data-name="'+data.data.cate_name+'" data-content="'+data.data.cate_content+'" data-parent="'+data.data.cate_parent+'" class="btn btn-primary btn-sm modal_edit" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-pencil" aria-hidden="true"></i></button>'
                                                                            +' <a href="#" id="del_'+data.data.id+'" data-id="'+data.data.id+'" role="button" class="btn btn-danger btn-sm btn_del"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
                                                                        +'</td>'
                                                                        +'</tr>';
                                                                } else {
                                                                    title = '<tr id="cate_tr_'+data.data.id+'">'
                                                                        +'<td><strong>'+data.data.cate_name+'</strong><br /><small>'+data.data.cate_content+'</small></td>'
                                                                        +'<td>'+''+'</td>'
                                                                        +'<td>'+
                                                                            '<button data-id="'+data.data.id+'" data-name="'+data.data.cate_name+'" data-content="'+data.data.cate_content+'" data-parent="'+data.data.cate_parent+'" class="btn btn-primary btn-sm modal_edit" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-pencil" aria-hidden="true"></i></button>'
                                                                            +' <a href="#" id="del_'+data.data.id+'" data-id="'+data.data.id+'" role="button" class="btn btn-danger btn-sm btn_del"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
                                                                        +'</td>'
                                                                        +'</tr>';
                                                                }
                                                            $('tbody').prepend(title);
                                                        }
                                                    }
                                                    if(data.status == 2) {
                                                        if(data.messages.code=='200') {
                                                            var title = "";
                                                            title = '<tr id="cate_tr_'+data.data.id+'">'
                                                                +'<td><strong>'+data.data.cate_name+'</strong><br /><small>'+data.data.cate_content+'</small></td>'
                                                                +'<td>'+data.data.name_cate_parent.cate_name+'</td>'
                                                                +'<td>'+
                                                                    '<button data-id="'+data.data.id+'" data-name="'+data.data.cate_name+'" data-content="'+data.data.cate_content+'" data-parent="'+data.data.cate_parent+'" class="btn btn-primary btn-sm modal_edit" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-pencil" aria-hidden="true"></i></button>'
                                                                    +' <a href="#" id="del_'+data.data.id+'" data-id="'+data.data.id+'" role="button" class="btn btn-danger btn-sm btn_del"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
                                                                +'</td>'
                                                                +'</tr>';
                                                            $("#cate_tr_"+cate_id).replaceWith(title);
                                                        }
                                                    }
                                                    $('#modal_close').trigger('click');
                                                },
                                                error: function(err) {
                                                    console.log(err)
                                                }
                                            });
                                        });
                                    }
                                    $('#modal_add').click(function() {
                                        $('#modal_add_category').find('.modal-title').text('Thêm mới danh mục');
                                        $('#modal_add_category').find('#btn_add_cate').text('Add category');
                                        $('#cate_name').val('');
                                        $('#cate_content').val('');
                                        listCateParent();
                                        $('#cate_parent').val('');
                                        addUpdateCateDB('add');
                                    });
                                    $('.modal_edit').click(function() {
                                        $('#modal_add_category').find('#btn_add_cate').text('Cập nhật danh mục');
                                        $('#modal_add_category').find('#btn_add_cate').text('Edit category');
                                        $('#cate_id').val($(this).data('id'));
                                        $('#cate_name').val($(this).data('name'));
                                        $('#cate_content').val($(this).data('content'));
                                        listCateParent();
                                        $('#cate_parent').val($(this).data('parent'));
                                        addUpdateCateDB('update');
                                    });
                                    $('body').on('click', '.btn_del', function() {
                                        var id = $(this).data('id');
                                        console.log(id);
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
                                                    url: '{{url("/")}}/admin/category/del',
                                                    data: {
                                                        "id": id
                                                    },
                                                    success: function(){
                                                        $('#cate_tr_'+id).remove();
                                                        swal("Dữ liệu đã được xóa thành công", {
                                                          icon: "success",
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
                            <h3><i class="fa fa-sitemap"></i> All categories (2 categories)</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên danh mục</th>
                                        <th style="width:150px">Danh mục cha</th>
                                        <th style="width:120px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dat)
                                        <tr id="cate_tr_{{$dat->id}}">
                                            <td>
                                                <strong>{{$dat->cate_name}}</strong><br />
                                                <small>{{$dat->cate_content}}</small>
                                            </td>
                                            <td>{{!empty(nameParent($dat->cate_parent))?nameParent($dat->cate_parent):''}}</td>
                                            <td>
                                                <button data-id="{{$dat->id}}" data-name="{{$dat->cate_name}}" data-content="{{$dat->cate_content}}" data-parent="{{$dat->cate_parent}}" class="btn btn-primary btn-sm modal_edit" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                
                                                <a href="#" id="del_{{$dat->id}}" data-id="{{$dat->id}}" role="button" class="btn btn-danger btn-sm btn_del"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                
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
            
        });
    </script>
@endsection