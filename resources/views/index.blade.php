<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/main/appOverride.css')}}">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <style>
        #auth-right {
            background: white !important;
            height: 100%;
        }

        #auth-right {
            width: 100%;
            height: 100%;
            position: relative;
        }

        #auth-right .full-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }


        #auth-left {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* bayangan halus */
            background-color: rgba(74, 71, 71, 0.9); /* transparan */
            border-radius: 8px;
        }


    </style>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('{{ asset('assets/images/bglogin.jpeg') }}'); background-size: cover; background-position: center;">
                {{-- <div id="auth-left" class="w-100" style="max-width: 1000px;"> --}}
                <div id="auth-left" class="w-100" style="max-width: 1000px; box-shadow: 0 0 20px rgba(0,0,0,0.3);">

                    <h1 class="auth-title text-center text-white"><ak href="/register">Gizi Smart Siaga</a></h1>
                    <h3 class="auth-subtitle mb-5 text-center text-white">Kenali Status Gizi Anda, Hamil Sehat Cegah Stunting</h3>

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    @endif

                    <form action="/login" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email"
                                class="form-control form-control-xl @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="Email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>

                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password"
                                class="form-control form-control-xl @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                    </form>
                </div>
            </div>
            {{-- <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img src="{{ asset('assets/images/bglogin.jpg') }}" alt="" class="full-img">
                </div>
            </div> --}}

        </div>

    </div>
</body>

</html>
