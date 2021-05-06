<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coffee Buzz Manger System</title>
    <meta name="description" content="Coffee Buzz Manger System">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/lib/vector-map/jqvmap.min.css')}}">
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800'>
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/toastr-master/toastr.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/css/jqueryui-editable.css">
    @yield('css')
</head>

<body>
    <!-- Left Menu Panel Start -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('resources/views/images/logo.png')}}" width="110%" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('resources/views/images/logo.png')}}" width="100%" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <h3 class="menu-title">Product & Order</h3>
                    <li>
                        <a href="{{url('/order/new')}}" id="new-order-btn"> <i class="menu-icon fa fa-map-o"></i>Shopping Cart</a>
                        <a href="{{url('/order/list')}}"> <i class="menu-icon fa fa-map-o"></i>Order List</a>
                    </li>
                    <h3 class="menu-title">Setting</h3>
                     <li>
                        <a id="logout-btn" href="{{url('/logout')}}"><i class="menu-icon fa fa-puzzle-piece"></i>Logout</a>
                     </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- Left Menu Panel End -->

    <!-- Right Main Panel Start -->
    <div id="right-panel" class="right-panel">
        <!-- Header Tool Bar Start -->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <lable>Welcome, {{Session::get('customer')[0]['name']}} !</lable>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Tool Bar End -->

        <!-- Main Content Start -->
        @yield('content')
        <!-- Main Content End-->
    </div>
    <!-- Right Main Panel End -->

    <!-- Scripts Start -->
    <script src="{{asset('resources/community/sufee-admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{asset('resources/community/sufee-admin/assets/js/plugins.js')}}"></script>
    <script src="{{asset('resources/community/sufee-admin/assets/js/main.js')}}"></script>
    <script src="{{asset('resources/community/sufee-admin/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('resources/community/sufee-admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('resources/community/sufee-admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/js/jqueryui-editable.min.js"></script>
    <script src="{{asset('resources/community/toastr-master/toastr.js')}}"></script>
    @yield('script')
    <!-- Scripts End -->
</body>

</html>