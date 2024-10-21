<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shopping</title>
    {{-- @todo lai --}}
    {{-- @if (session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif --}}

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @yield('css')
</head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        {{-- <a href="{{ route('admin.index') }}" class="logo"> --}}
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="js-notification">
                {{-- <i class="fa fa-envelope-o"></i> --}}
                <i class="fa fa-bell-o"></i>
                {{-- @todo --}}
                {{-- <span class="label label-danger total-message" style="font-size: 14px !important;">{{Auth::user()->unreadNotifications->count()}}</span> --}}
                </a>
                <ul class="dropdown-menu">   
                  <li>  
                  </li>
                  <li class="footer"><a href="" class="" >Read aLL Messages</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              {{-- @todo lai --}}
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">

                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    <div class="pull-left info">
                      {{-- @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->id_role == 2)
                          <p class="m-0">{{ Auth::guard('admin')->user()->name }}</p>
                          <h5 class="m-0">{{ Auth::guard('admin')->user()->email }}</h5>
                      @endif --}}
                  </div>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                       <a href="homepage" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
          
              {{-- @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->id_role == 2)
                  <p class="m-0">{{ Auth::guard('admin')->user()->name }}</p>
                  <h5 class="m-0">{{ Auth::guard('admin')->user()->email }}</h5>
              @endif --}}
          </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          {{-- @todo lai --}}
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('admin-datn') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
                </a>
            </li>
          {{-- @todo lai --}}

          <li class="{{ Request::is('admin-datn/menu*') ? 'active' : '' }}">
            <a href="{{'account-index'}}">
                <i class="fa fa-asterisk"></i> <span>Tài Khoản</span>
            </a>
          </li>

            <li class="{{ Request::is('admin-datn/menu*') ? 'active' : '' }}">
              <a href="{{ route('indexcategory') }}">
                  <i class="fa fa-list"></i> <span>Danh mục</span>
              </a>
            </li>

            <li class="{{ Request::is('admin-datn/product*') ? 'active' : '' }}">
                <a href="{{'product'}}">
                      <i class="fa fa-fw fa-anchor"></i> <span>Sản phẩm</span>
                  </a>
              </li>

              <li class="{{ Request::is('admin-datn/transaction*') ? 'active' : '' }}">
                <a href="{{url('product-type-index')}}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Loại sản phẩm</span>
                </a>
            </li>
  

        
            {{-- <li class="{{ Request::is('admin-datn/attribute*') ? 'active' : '' }}">
                <a href="#">
                    <i class="glyphicon glyphicon-asterisk"></i> <span>Phân loại</span>
                </a>
            </li> --}}

          

            <li class="{{ Request::is('admin-datn/transaction*') ? 'active' : '' }}">
                <a href="{{'oders-index'}}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Đơn hàng</span>
                </a>
            </li>

          
          <li class="{{ Request::is('admin-datn/article*') ? 'active' : '' }}">
            {{-- <a href="{{ route('indexcategorypost') }}">
                <i class="fa fa-circle-o-notch"></i> <span>Danh sách bài viết</span>
            </a> --}}
          </li>

            <li class="{{ Request::is('admin-datn/article*') ? 'active' : '' }}">
              {{-- <a href="{{ route('indexpost') }}">
                  <i class="fa fa-circle-o-notch"></i> <span>Bài viết</span>
              </a> --}}
            </li>

           

            <li class="header">Hệ Thống</li>

            <li class="{{ Request::is('admin-datn/statistical*') ? 'active' : '' }}">
              <a href="">
                  <i class="fa fa-circle-o text-red"></i> <span>Thống Kê</span>
              </a>
            </li>

            <li class="{{ Request::is('admin-datn/slide*') ? 'active' : '' }}">
                <a href="">
                    <i class="fa fa-circle-o text-red"></i> <span>Slide</span>
                </a>
            </li>
            <li class="{{ Request::is('admin-datn/user*') ? 'active' : '' }}">
              <a href="">
                  <i class="fa fa-users"></i> <span>Tài Khoản</span>
              </a>
          </li>
          

          </ul>
          
        </section>
        <!-- /.sidebar -->
      </aside>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        @yield('content')
        <h1 class="text-center text-primary ">Quản lý Shop Bán Hàng Pink Slay</h1>
        
      </div>
   
      <!-- /.content-wrapper -->

      {{-- <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2023 <a href="#">Cao Anh Vũ</a>.</strong> All rights
        reserved.
      </footer> --}}
      <!-- Control Sidebar -->

      <!-- /.control-sidebar -->
      <!-- Add the sidebars background. This div must be placed
        immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('admin/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        if(typeof TYPE_MESSAGE != "undefined"){
            switch(TYPE_MESSAGE){
                case 'success':
                    toastr.success(MESSAGE)
                    break;
                case 'error':
                    toastr.error(MESSAGE)
                    break;
                case 'warning':
                    toastr.warning(MESSAGE)
                    break;
                case 'info':
                    toastr.info(MESSAGE)
                    break;
            }
        }
        
    </script>
    <script type="text/javascript">
      
  </script>

    @yield('script')

    

  </body>
</html>
