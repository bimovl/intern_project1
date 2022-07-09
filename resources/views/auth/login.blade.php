<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berani Digital ID</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>
<body>
<div id="auth">

<div class="row justify-content-center">
    <div class="col-lg-8 col-12">
        <div id="auth-center">
            
            
        <main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Log in Berani Digital ID</h3>
                    <p class="auth-subtitle mb-5 text-center">Log in with your data that you entered during registration.</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" placeholder="Your E-mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <input id="password" type="password" class="form-control orm-control-xl @error('password') is-invalid @enderror" name="password" placeholder="Password (Min 8 Character)" required autocomplete="current-password">
                                <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" value="" id="flexCheckDefault" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Log in</button>
                            <div class="text-center">
                            <a href="{{route ('login.google')}}" class="btn btn-danger mt-4"><i class="bi bi-google"></i> Log in using Google</a>
                            <a href="{{route ('login.github')}}" class="btn btn-secondary mt-4"><i class="bi bi-github"></i> Log in using Github</a>
                            <a href="{{route ('login.facebook')}}" class="btn btn-primary mt-3"><i class="bi bi-facebook"></i> Log in using Facebook</a>
                            
                            </div>
                            <div class="text-center mt-4 text-lg fs-8">
                             <p class="text-gray">Don't have an account? <a href="{{route('register')}}"
                                class="font-bold">Register</a>.</p>
                                @if (Route::has('password.request'))
                            <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.</p>
                            @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
    </div>
</body>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/extensions/sweetalert2.js"></script>
    <script src="/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>
    <script src="/assets/js/main.js"></script>
@include('sweetalert::alert')
</html>

