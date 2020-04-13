<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>VLNK - admin</title>
		<meta name="description" content="VLNK - admin">
		<meta name="author" content="Pike Web Development - https://www.pikephp.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{url('/pike')}}/assets/images/favicon.ico">

		<!-- Bootstrap CSS -->
		<link href="{{url('/pike')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome CSS -->
		<link href="{{url('/pike')}}/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/pike')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
		<link href="{{url('/pike')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/pike')}}/assets/css/fix.css" rel="stylesheet" type="text/css" />
		
		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
        <script src="{{url('/pike')}}/assets/js/modernizr.min.js"></script>
        <script src="{{url('/pike')}}/assets/js/jquery.min.js"></script>
        <script src="{{url('/pike')}}/assets/js/popper.min.js"></script>
        <script src="{{url('/pike')}}/assets/js/bootstrap.min.js"></script>
        <script src="{{url('/pike')}}/assets/plugins/select2/js/select2.min.js"></script>
        

		
</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="{{url('admin')}}" class="logo"><img alt="Logo" src="{{url('/pike')}}/assets/images/logo.png" /> <span>Admin</span></a>
        </div>

        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
				
				
                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope-o"></i><span class="notif-bullet"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><small><span class="label label-danger pull-xs-right">12</span>Contact Messages</small></h5>
                        </div>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">                                    
                            <p class="notify-details ml-0">
                                <b>Jokn Doe</b>
                                <span>New message received</span>
                                <small class="text-muted">2 minutes ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">                                    
                            <p class="notify-details ml-0">
                                <b>Michael Jackson</b>
                                <span>New message received</span>
                                <small class="text-muted">15 minutes ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">                                    
                            <p class="notify-details ml-0">
                                <b>Foxy Johnes</b>
                                <span>New message received</span>
                                <small class="text-muted">Yesterday, 13:30</small>
                            </p>
                        </a>

                        <!-- All-->
                        <a href="#" class="dropdown-item notify-item notify-all">
                            View All
                        </a>

                    </div>
                </li>
                
				<li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-fw fa-bell-o"></i><span class="notif-bullet"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">
						<!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><small><span class="label label-danger pull-xs-right">5</span>Allerts</small></h5>
                        </div>
						
                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <div class="notify-icon bg-faded">
                                <img src="{{url('/pike')}}/assets/images/avatars/avatar2.png" alt="img" class="rounded-circle img-fluid">
                            </div>
                            <p class="notify-details">
                                <b>John Doe</b>
                                <span>User registration</span>
                                <small class="text-muted">3 minutes ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <div class="notify-icon bg-faded">
                                <img src="{{url('/pike')}}/assets/images/avatars/avatar3.png" alt="img" class="rounded-circle img-fluid">
                            </div>
                            <p class="notify-details">
                                <b>Michael Cox</b>
                                <span>Task 2 completed</span>
                                <small class="text-muted">12 minutes ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <div class="notify-icon bg-faded">
                                <img src="{{url('/pike')}}/assets/images/avatars/avatar4.png" alt="img" class="rounded-circle img-fluid">
                            </div>
                            <p class="notify-details">
                                <b>Michelle Dolores</b>
                                <span>New job completed</span>
                                <small class="text-muted">35 minutes ago</small>
                            </p>
                        </a>

                        <!-- All-->
                        <a href="#" class="dropdown-item notify-item notify-all">
                            View All Allerts
                        </a>

                    </div>
                </li>

                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown">
                        <img src="{{url('/pike')}}/assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                    </a>
                    <div class="dropdown-menu">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>Hello, admin</small> </h5>
                        </div>

                        <!-- item-->
                        <a href="{{url('admin/profile')}}" class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>Profile</span>
                        </a>
                        <a href="{{url('admin/setting')}}" class="dropdown-item notify-item">
                            <i class="fa fa-cogs bigfonts" aria-hidden="true"></i> <span>Cài đặt</span>
                        </a>

                        <!-- item-->
                        <a href="{{url('admin/logout')}}" class="dropdown-item notify-item">
                            <i class="fa fa-power-off"></i> <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
						<i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>                        
            </ul>
        </nav>
	</div>
	<!-- End Navigation -->
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
		<div class="sidebar-inner leftscroll">
			<div id="sidebar-menu">
    			<ul>
    				<li class="submenu">
    					<a class="active" href="{{url('admin')}}"><i class="fa fa-fw fa-bars"></i><span> Trang chủ </span> </a>
                    </li>
    				<li class="submenu">
                        <a class="@if(Request::is('admin/account') || Request::is('admin/account/*')) pro @endif" href="{{url('admin/account')}}"><i class="fa fa-address-card bigfonts bigfonts"></i><span> Tài khoản </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="@if(Request::is('admin/category') || Request::is('admin/category/*')) pro @endif" href="{{url('/admin/category')}}"><i class="fa fa-th-list bigfonts"></i><span> Danh mục </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="@if(Request::is('admin/product') || Request::is('admin/product/*')) pro @endif" href="{{url('/admin/product')}}"><i class="fa fa-product-hunt bigfonts"></i><span> Sản phẩm </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="@if(Request::is('admin/post') || Request::is('admin/post/*')) pro @endif" href="{{url('admin/post')}}"><i class="fa fa-podcast bigfonts"></i><span> Tin tức</span> </a>
                    </li>
                    <li class="submenu">
                        <a class="@if(Request::is('admin/video') || Request::is('admin/video/*')) pro @endif" href="{{url('admin/video')}}"><i class="fa fa-play-circle bigfonts"></i><span> Videos</span> </a>
                    </li>
    				{{-- <li class="submenu">
                        <a href="#"><i class="fa fa-fort-awesome bigfonts"></i> <span> Đại lý </span> <span class="menu-arrow"></span></a>
    						<ul class="list-unstyled">
    							<li><a href="tables-basic.html">Basic Tables</a></li>
    							<li><a href="tables-datatable.html">Data Tables</a></li>
    						</ul>
                    </li> --}}
                    <li class="submenu">
                        <a class="@if(Request::is('admin/contact') || Request::is('admin/contact/*')) pro @endif" href="{{url('admin/contact')}}"><i class="fa fa-volume-control-phone bigfonts"></i><span> Liên hệ </span> </a>
                    </li>
                    <li class="submenu">
                        <a class="@if(Request::is('admin/order') || Request::is('admin/order/*')) pro @endif" href="{{url('admin/order/')}}"><i class="fa fa-cart-plus bigfonts"></i><span> Đơn hàng </span> </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
	<!-- End Sidebar -->


    <div class="content-page">
		<!-- Start content -->
        @yield('main')
		<!-- END content -->
    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		{{-- <span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span> --}}
		<span class="float-right">
		Powered by <a href="tel:0354524503"><b>Phương Nam</b></a>
		</span>
	</footer>

</div>
<!-- END main -->



<script src="{{url('/pike')}}/assets/js/moment.min.js"></script>
<script src="{{url('/pike')}}/assets/js/detect.js"></script>
<script src="{{url('/pike')}}/assets/js/fastclick.js"></script>
<script src="{{url('/pike')}}/assets/js/jquery.blockUI.js"></script>
<script src="{{url('/pike')}}/assets/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="{{url('/pike')}}/assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<!-- Counter-Up-->
	<script src="{{url('/pike')}}/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="{{url('/pike')}}/assets/plugins/counterup/jquery.counterup.min.js"></script>
    <script src="{{url('/pike')}}/assets/js/sweetalert.min.js"></script>
    <script src="{{url('/pike')}}/assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>	
    {{-- <script src="{{url('/')}}/editor/ckeditor17/ckeditor.js"></script>  --}}
    <script src="{{url('/')}}/editor/ckeditor48/ckeditor.js"></script> 
    {{-- <script> CKEDITOR.replace('editor72'); </script> --}}
    
    @yield('add_script')
	<script>
		$(document).ready(function() {
			// data-tables
			$('#example1').DataTable();
					
			// counter-up
			$('.counter').counterUp({
				delay: 10,
				time: 600
			});
		} );		
	</script>
    <script>                                
        $(document).ready(function() {
            $('.select2').select2({
                maximumSelectionLength: 3
            });
        });
    </script>
    <script>
        // js chon anh
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            }); 
        });
    </script>
    <script>
        // js chon anh
        function changeImg2(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar2').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar2').click(function(){
                $('#img2').click();
            }); 
        });
    </script>

</body>
</html>