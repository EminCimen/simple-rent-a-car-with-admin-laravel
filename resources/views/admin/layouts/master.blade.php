<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cimen - @yield('title')</title>
    <link href="/backend/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('backend.index')}}">Cimen Rent a Car</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </div>

    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('backend.adminAdd',['id' => Auth::id()])}}">Kullanıcı Ayarları</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('backend.logout')}}">Çıkış yap</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Çekirdek</div>
                    <a class="nav-link" href="{{route('backend.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Rezervasyon</div>
                    <a class="nav-link" href="{{route('backend.reservation.page')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Tüm Rezervasyonlar
                    </a>

                    <div class="sb-sidenav-menu-heading">Araçlar</div>
                    <a class="nav-link" href="{{route('backend.carList')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                        Araçlar
                    </a>
                    <a class="nav-link" href="{{route('backend.carAdd')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                        Araç Ekle
                    </a>


                    <div class="sb-sidenav-menu-heading">Müşteriler</div>
                    <a class="nav-link" href="{{route('backend.userlist.page')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Müşteri Listele
                    </a>

                    <div class="sb-sidenav-menu-heading">Yönetici</div>
                    <a class="nav-link" href="{{route('backend.adminList')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                        Yöneticiler
                    </a>
                    <a class="nav-link" href="{{route('backend.adminAdd')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-unlock-alt"></i></div>
                        Yönetici Ekle
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Giriş yaptınız:</div>
                {{Auth::user()->email}}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Cimen 2021</div>
                    <div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/backend/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="/backend/assets/demo/chart-area-demo.js"></script>
<script src="/backend/assets/demo/chart-bar-demo.js"></script>

<script src="/backend/assets/demo/datatables-demo.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
@include('sweetalert::alert')
@yield('scripts')
</body>
</html>
