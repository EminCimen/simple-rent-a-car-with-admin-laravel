<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cimen - @yield('title')</title>

    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/css/heroic-features.css" rel="stylesheet">

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">Cimen Rent a Car</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Anasayfa
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listAll')}}">Araçlar</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Giriş Yap</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('memberSettings')}}">Müşteri Paneli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Çıkış Yap</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    @yield('content')
</div>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Cimen 2021</p>
    </div>
</footer>


<script src="/frontend/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/moment.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@include('sweetalert::alert')

</body>

</html>
