<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ayotanding')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .navbar-brand i {
            font-size: 1.8rem;
        }
        .nav-link {
            font-weight: 500;
            transition: all 0.2s;
        }
        .nav-link:hover {
            transform: translateY(-1px);
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s;
        }
        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .card-img-top {
            border-radius: 1rem 1rem 0 0;
            object-fit: cover;
            height: 200px;
        }
        .btn {
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn:hover {
            transform: translateY(-1px);
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            border: 1.5px solid #dee2e6;
            padding: 0.6rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.15);
        }
        .alert {
            border-radius: 0.75rem;
            border: none;
        }
        footer {
            margin-top: auto;
        }
        .hero-section {
            background: linear-gradient(135deg, #198754 0%, #146c43 100%);
            color: white;
            padding: 4rem 0;
            margin-top: -1rem;
        }
        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .stat-card i {
            font-size: 2rem;
            color: #198754;
        }
        @media (max-width: 768px) {
            .hero-section {
                padding: 2rem 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <i class="bi bi-trophy me-2"></i>Ayotanding
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main') }}"><i class="bi bi-house-door me-1"></i>Main</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('keranjang') }}"><i class="bi bi-cart me-1"></i>Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('daftarkan-lapangan') }}"><i class="bi bi-plus-square me-1"></i>Daftarkan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tiket') }}"><i class="bi bi-ticket me-1"></i>Tiket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}"><i class="bi bi-person me-1"></i>Profile</a>
                        </li>
                        @if(auth()->user() && auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield me-1"></i>Admin</a>
                        </li>
                        @endif
                        <li class="nav-item ms-lg-2">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right me-1"></i>Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-light btn-sm" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <footer class="bg-dark text-light py-3 mt-auto">
        <div class="container text-center">
            <p class="mb-0 small">&copy; {{ date('Y') }} Ayotanding — M. Nabil Maulana &amp; M. Habil Aswad</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
