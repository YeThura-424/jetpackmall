<!DOCTYPE html>
<html lang="en">

<head>
    <title> Jatpack Mall </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('logo/favicon.jpg') }}" type="image/gif" sizes="16x16">
    <!-- iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('icon/icofont/icofont.min.css')}}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css')}}">
    {{-- summernote --}}
    <link rel="stylesheet" type="text/css" href=" {{asset('summernote/summernote-bs4.css')}} ">
    {{-- multiple image upload and preview css --}}
    <link rel="stylesheet" type="text/css" href=" {{asset('multipleimageupload/image-uploader.min.css')}} ">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="index.html">
            <img src="{{ asset('logo/favicon.png')}}" style="width: 50px; height: 50px">
            Jetpack Mall
        </a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle pt-2" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
            <i class="icofont-navigation-menu"></i>
        </a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="app-search">
                <input class="app-search__input" type="search" placeholder="Search">
                <button class="app-search__button">
                    <i class="icofont-search-2"></i>
                </button>
            </li>
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="icofont-user-alt-3"></i>
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="page-user.html">
                            <i class="icofont-ui-user"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icofont-logout"></i>
                            Logout
                        </a>
                        <form id="logout-form" action=" {{route('logout')}} " method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset(Auth::user()->profile)}}" alt="User Image" style="width: 50px; height: 50px;">
            <div>
                <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
                <p class="app-sidebar__user-designation"> {{Auth::user()->roles()->pluck('name')[0]}} </p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'dashboard' ? 'active':''}}" href="{{route('backside.dashboard.index')}}">
                    <i class="app-menu__icon icofont-dashboard"></i>
                    <span class="app-menu__label">
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'order' ? 'active':''}}" href="{{route('backside.order.index')}}">
                    <i class="app-menu__icon icofont-prestashop"></i>
                    <span class="app-menu__label">
                        Order
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'customer' ? 'active':''}}" href="{{route('backside.customer.index')}}">
                    <i class="app-menu__icon icofont-users-social"></i>
                    <span class="app-menu__label">
                        Customer
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'township' ? 'active':''}}" href="{{route('backside.township.index')}}">
                    <i class="app-menu__icon icofont-ui-tag"></i>
                    <span class="app-menu__label">
                        Townships
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'brand' ? 'active':''}}" href="{{route('backside.brand.index')}}">
                    <i class="app-menu__icon icofont-ui-tag"></i>
                    <span class="app-menu__label">
                        Brands
                    </span>
                </a>
            </li>
            <!-- <li>
                <a class="app-menu__item {{Request::segment(2) === 'item' ? 'active':''}}" href="">
                    <i class="app-menu__icon icofont-package"></i>
                    <span class="app-menu__label">
                        Items
                    </span>
                </a>
            </li> -->
            <li class="treeview">
                <a class="app-menu__item {{Request::segment(2) === 'item' ? 'active':''}}" href="#" data-toggle="treeview">
                    <i class="app-menu__icon icofont-package"></i>
                    <span class="app-menu__label">Items</span>
                    <i class="treeview-indicator icofont-rounded-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item {{Request::segment(3) === 'list' ? 'active':''}}" href="{{route('backside.list.index')}}"><i class="icon icofont-dotted-right"></i> List</a></li>
                    <li><a class="treeview-item {{Request::segment(3) === 'discount' ? 'active':''}}" href="{{route('backside.discount.index')}}"><i class="icon icofont-dotted-right"></i> Discount</a></li>
                </ul>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'subcategory' ? 'active':''}}" href="{{route('backside.subcategory.index')}}">
                    <i class="app-menu__icon icofont-tags"></i>
                    <span class="app-menu__label">
                        Sub-Category
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'category' ? 'active':''}}" href="{{route('backside.category.index')}}">
                    <i class="app-menu__icon icofont-tag"></i>
                    <span class="app-menu__label">
                        Category
                    </span>
                </a>
            </li>
        </ul>
    </aside>

    {{$slot}} {{-- to insert the inner data  --}}

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('backend/js/popper.min.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('backend/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    {{-- Summernote js --}}
    <script src=" {{asset('summernote/summernote-bs4.js')}} "></script>
    {{-- multiple image upload and preview js --}}
    <script src=" {{asset('multipleimageupload/image-uploader.min.js')}} "></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/chart.js')}}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
    @yield("script_content");
</body>

</html>