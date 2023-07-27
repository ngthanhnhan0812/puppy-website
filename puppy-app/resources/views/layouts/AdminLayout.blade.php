<!DOCTYPE HTML>
<html>

<head>
    <title>Puppy admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('asset/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <!-- Custom CSS -->
    @yield('css')

    <script src="https://kit.fontawesome.com/99a0617376.js" crossorigin="anonymous"></script>
    <!-- side nav css file -->
    <link href='{{ asset('asset/css/SidebarNav.min.css') }}' media='all' rel='stylesheet' type='text/css' />
    <!-- //side nav css file -->

    <!-- js-->
    <script src="{{ asset('asset/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/modernizr.custom.js') }}"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet">
    <!--//webfonts-->



    <!-- Metis Menu -->
    <script src="{{ asset('asset/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('asset/js/custom.js') }}"></script>
    <link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">

    <!--//Metis Menu -->
    <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }
    </style>

    <link href="{{ asset('asset/css/owl.carousel.css') }}" rel="stylesheet">


</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <!--left-fixed -navigation-->
            <aside class="sidebar-left">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="navbar-brand" href="{{ route('dashboard') }}"><span
                                    class="fa fa-area-chart"></span>
                                Puppy<span class="dashboard_text">Admin dashboard</span></a></h1>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="sidebar-menu">
                            <li class="header">MAIN NAVIGATION</li>
                            <li class="treeview">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-laptop"></i>
                                    <span>Components</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('show_post') }}"><i class="fa fa-angle-right"></i> Manage
                                            Post</a></li>
                                    <li><a href="{{ route('show_detail_category') }}"><i
                                                class="fa fa-angle-right"></i>Manage Category</a></li>
                                    <li><a href=""><i class="fa fa-angle-right"></i>Manage Libary</a></li>
                                    <li><a href="{{ route('manage_comment') }}"><i
                                                class="fa fa-angle-right"></i>Manage Comment</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-edit"></i> <span>Forms</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('add_post') }}"><i class="fa fa-angle-right"></i>
                                            Create Post</a></li>
                                    <li><a href="{{ route('create_category') }}"><i class="fa fa-angle-right"></i> Create CateGory</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="{{ route('list_user') }}">
                                    <i class="fa fa-table"></i> <span>User List</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-th"></i>
                                    <span>Approve</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('approve_comment') }}"><i class="fa fa-angle-right"></i>
                                            Comments</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-envelope"></i> <span>Mailbox </span>
                                    <i class="fa fa-angle-left pull-right"></i><small
                                        class="label pull-right label-info1">08</small><span
                                        class="label label-primary1 pull-right">02</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="inbox.html"><i class="fa fa-angle-right"></i> Mail Inbox </a></li>
                                    <li><a href="compose.html"><i class="fa fa-angle-right"></i> Compose Mail </a></li>
                                </ul>
                            </li>
                            <li class="header">LABELS</li>
                            <li><a href="#"><i class="fa fa-angle-right text-red"></i> <span>Important</span></a>
                            </li>
                            <li><a href="#"><i class="fa fa-angle-right text-yellow"></i>
                                    <span>Warning</span></a>
                            </li>
                            <li><a href="#"><i class="fa fa-angle-right text-aqua"></i>
                                    <span>Information</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </aside>
        </div>
        <!--left-fixed -navigation-->

        <!-- header-starts -->
        <div class="sticky-header header-section ">
            <div class="header-left">
                <!--toggle button start-->
                <button id="showLeftPush" class="ps-4"><i class="fa fa-bars"></i></button>
                <!--toggle button end-->
                <div class="profile_details_left">
                    <!--notifications of menu start -->
                    {{-- <ul class="nofitications-dropdown">
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">4</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 3 new messages</h3>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">4</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 3 new notification</h3>
                                    </div>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-tasks"></i><span
                                    class="badge blue1">8</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 8 pending task</h3>
                                    </div>
                                </li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Database update</span><span
                                                class="percentage">40%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar yellow" style="width:40%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Dashboard done</span><span
                                                class="percentage">90%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar green" style="width:90%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Mobile App</span><span
                                                class="percentage">33%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar red" style="width: 33%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Issues fixed</span><span
                                                class="percentage">80%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar  blue" style="width: 80%;"></div>
                                        </div>
                                    </a></li>
                                <li>
                                    <div class="notification_bottom">
                                        <a href="#">See all pending tasks</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul> --}}
                    <div class="clearfix"> </div>
                </div>
                <!--notification menu end -->
                <div class="clearfix"> </div>
            </div>
            <div class="header-right">


                <!--search-box-->
                <div class="search-box">
                    <form class="input">
                        <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search"
                            id="input-31" />
                        <label class="input__label" for="input-31">
                            <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77"
                                preserveAspectRatio="none">
                                <path d="m0,0l404,0l0,77l-404,0l0,-77z" />
                            </svg>
                        </label>
                    </form>
                </div>
                <!--//end-search-box-->

                <div class="profile_details">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
                                    <div class="user-name">
                                        <p>Admin Dashboard</p>
                                        <span>Administrator</span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li> <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                @yield('content')


            </div>
        </div>
        <!--footer-->
        <div class="footer">
            <p> Design by <a href="#"
                    target="_blank">Patrona Puppy Team</a></p>
        </div>
        <!--//footer-->
    </div>

    <!-- new added graphs chart js-->

    <!-- new added graphs chart js-->

    <!-- Classie -->
    <!-- for toggle left push menu script -->
    <script src="{{ asset('asset/js/classie.js') }}"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };


        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <!-- //Classie -->
    <!-- //for toggle left push menu script -->

    <!--scrolling js-->
    <script src="{{ asset('asset/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('asset/js/scripts.js') }}"></script>
    <!--//scrolling js-->

    <!-- side nav js -->
    <script src='{{ asset('asset/js/SidebarNav.min.js') }}' type='text/javascript'></script>
    <script>
        $('.sidebar-menu').SidebarNav()
    </script>
    


    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
    <!-- //Bootstrap Core JavaScript -->
    <!-- Btn Close Alert -->
    <script>
        $('.close').click(function() {
            $(this).parent().remove();
        });
    </script>
    <script>
        function assetDelete() {
            return confirm("Are you sure to delete this Field ?");
        }
    </script>
    @yield('script')

</body>

</html>
