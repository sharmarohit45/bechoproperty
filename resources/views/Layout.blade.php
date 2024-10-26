<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bechoproperty</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- CSS -->
    <link href="/Images/Property/logo-2.png" rel="icon">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/Images/Property/logo.png') }}" alt="Logo" style="height: 70px;" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <ul class="navbar-nav mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/buy') }}">Buy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/rent') }}">Rent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ url('/all-properties') }}">Property</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ url('/our-packages') }}">Packages</a>
                        </li>
                       <li class="nav-item">
                            <a class="nav-link" href="{{ url('/Leads') }}">Property Lead</a>
                        </li> 
                       <li class="nav-item">
                            <a class="nav-link" href="{{ url('/projects') }}">Projects</a>
                        </li> 
                    </ul>
                    <div class="text-end ms-3">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a href="{{ url('/redirect') }}">

                                        <button type="button" class="btn btn-outline-light me-2"> Dashboard</button>
                                    </a>
                                @else
                                    <a style="text-decoration: none" href="{{ route('login') }}">
                                        <button type="button" class="btn btn-outline-light me-2">Login</button>
                                    </a>

                                   @if (Route::has('register'))
                                        <a href="{{ route('register') }}">
                                            <button type="button" class="btn btn-outline-light me-2">Register</button>
                                        </a>
                                    @endif 
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>
@yield('main')
<footer class="container-fluid bg-primary text-white pt-5 mb-0" >
    <div class="row">
        <div class="col-md-4 mb-md-0 text-center">
            <img src="{{ asset('/Images/Property/logo.png') }}" alt="Company Logo" class="img-fluid"
                style="width: 300px;" />
        </div>
        <div class="col-md-2 mb-md-0 text-start">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
                <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                <li><a href="{{ url('/about') }}" class="text-white text-decoration-none">Rent</a></li>
                <li><a href="{{ url('/services') }}" class="text-white text-decoration-none">Buy</a></li>
                <li><a href="{{ url('/Property-Lead') }}" class="text-white text-decoration-none">Lead Form</a></li>
                <li><a href="{{ url('/privacy-policy') }}" class="text-white text-decoration-none">Property</a>
                </li>
            </ul>
        </div>
        <div class="col-md-2 mb-md-0 text-start">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
                {{-- MAIN CITY --}}
                <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Package</a></li>
                <li><a href="{{ url('/login') }}" class="text-white text-decoration-none">Log In</a></li>
                <li><a href="{{ url('/register') }}" class="text-white text-decoration-none">Create Account</a></li>
                <li><a href="{{ url('/contact') }}" class="text-white text-decoration-none">Contact</a></li>
                <li><a href="{{ url('/privacy-policy') }}" class="text-white text-decoration-none">Terms & conditions</a>                </li>
            </ul>
        </div>
        <div class="col-md-4 mb-md-0">
            <h5>Follow Us</h5>
            <ul class="list-unstyled d-flex">
                <li class="me-3">
                    <a href="#" aria-label="Facebook" class="text-white text-decoration-none">
                        <i class="bi bi-facebook"></i>
                    </a>
                </li>
                <li class="me-3">
                    <a href="#" aria-label="Twitter" class="text-white text-decoration-none">
                        <i class="bi bi-twitter"></i>
                    </a>
                </li>
                <li class="me-3">
                    <a href="#" aria-label="Instagram" class="text-white text-decoration-none">
                        <i class="bi bi-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#" aria-label="LinkedIn" class="text-white text-decoration-none">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col pt-5 text-center">
            <p>&copy; 2017 Bechoproperty. All rights reserved.</p>
        </div>
        <div class="col-sm-2 text-end">
            <a href="#" aria-label="Scroll to top" class="text-white text-decoration-none scroll-to-top">
                <i class="bi bi-arrow-up-circle-fill" style="font-size: 50px;"></i>
            </a>
        </div>
    </div>
</footer>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>

