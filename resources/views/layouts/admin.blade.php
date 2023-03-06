<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/images/icon.png')}}">
    <title>Admin Panel - Perpustakaan </title>
    <link href="{{asset('admin/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">

</head>

<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <a href="/buku">
                            <img src="{{asset('admin/images/icon-1.png')}}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('admin/images/user.png')}}" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">
                                        {{ Auth::user()->name }}
                                    </span></span>
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/home" aria-expanded="false"><i
                                data-feather="home" class="feather-icon"></i><span class="hide-menu">Daftar
                                Buku</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('buku.create') }}"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Tambah Buku
                            </span></a>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/buku/export/pdf"
                            aria-expanded="false"><i class="fas fa-file-pdf"></i><span class="hide-menu">Export Buku
                            </span></a>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="/" aria-expanded="false">
                            <i class="fa fa-book"></i>
                            <span class="hide-menu">Dashboard User</span>
                        </a>
                    </li>

                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="#"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i data-feather="log-out" class="feather-icon"></i>
                            <span class="hide-menu">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="page-wrapper">
            <main class="py-4">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src=" {{asset('admin/libs/jquery/dist/jquery.min.js')}}">
    </script>
    <script src="{{asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dist/js/feather.min.js')}}"></script>
    <script src="{{asset('admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('admin/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('admin/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('admin/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('admin/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
    <script src="{{asset('admin/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

</body>

</html>