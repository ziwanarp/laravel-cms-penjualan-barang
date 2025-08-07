<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- ✅ Tambahkan jQuery duluan -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/main/appOverride.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/main/app-dark.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css')}}">
</head>

<body>
    @include('dashboard.layouts.sidebar')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-content">
            @yield('container')
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2025 &copy; Developer</p>
                </div>
                <div class="float-end">
                    <p>IMT</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Sekarang jQuery sudah di-load lebih dulu -->
    <script src="{{ asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>

    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js')}}"></script>
</body>


</html>
