<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ayotanding')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary: #059669;
            --primary-dark: #047857;
            --primary-light: #d1fae5;
            --primary-soft: #ecfdf5;
            --accent: #f59e0b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --shadow-sm: 0 1px 2px rgba(0,0,0,.05);
            --shadow: 0 1px 3px rgba(0,0,0,.1), 0 1px 2px rgba(0,0,0,.06);
            --shadow-md: 0 4px 6px rgba(0,0,0,.07), 0 2px 4px rgba(0,0,0,.06);
            --shadow-lg: 0 10px 15px rgba(0,0,0,.1), 0 4px 6px rgba(0,0,0,.05);
            --shadow-xl: 0 20px 25px rgba(0,0,0,.1), 0 10px 10px rgba(0,0,0,.04);
            --radius: 12px;
            --radius-lg: 16px;
        }

        * { font-family: 'Inter', sans-serif; }

        body {
            background: var(--gray-50);
            color: var(--gray-800);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }

        .navbar {
            background: rgba(255,255,255,.95) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            padding: .75rem 0;
            transition: box-shadow .3s;
        }
        .navbar.scrolled { box-shadow: var(--shadow-md); }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.35rem;
            color: var(--primary) !important;
            letter-spacing: -.5px;
        }
        .navbar-brand i { font-size: 1.6rem; color: var(--primary); }
        .nav-link {
            font-weight: 500;
            color: var(--gray-600) !important;
            padding: .5rem 1rem !important;
            border-radius: 8px;
            transition: all .2s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
            background: var(--primary-soft);
        }
        .navbar .btn-light {
            background: var(--primary);
            color: #fff !important;
            border: none;
            font-weight: 600;
            padding: .5rem 1.25rem;
            border-radius: 8px;
        }
        .navbar .btn-light:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }
        .navbar .btn-outline-light {
            border: 1.5px solid var(--gray-300);
            color: var(--gray-700) !important;
            font-weight: 600;
            padding: .5rem 1.25rem;
            border-radius: 8px;
        }
        .navbar .btn-outline-light:hover {
            border-color: var(--primary);
            color: var(--primary) !important;
            background: var(--primary-soft);
        }

        main { flex: 1; padding: 2rem 0; }

        .card {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: all .25s;
        }
        .card:hover { box-shadow: var(--shadow-md); }
        .card-img-top {
            border-radius: var(--radius) var(--radius) 0 0;
            object-fit: cover;
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: .6rem 1.25rem;
            transition: all .2s;
        }
        .btn:hover { transform: translateY(-1px); }
        .btn-success {
            background: var(--primary);
            border-color: var(--primary);
        }
        .btn-success:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        .btn-outline-success {
            color: var(--primary);
            border-color: var(--primary);
        }
        .btn-outline-success:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1.5px solid var(--gray-200);
            padding: .6rem 1rem;
            font-size: .9rem;
            transition: all .2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(5,150,105,.12);
        }

        .alert {
            border-radius: var(--radius);
            border: none;
            padding: 1rem 1.25rem;
        }
        .alert-success { background: var(--primary-soft); color: var(--primary-dark); }
        .alert-danger { background: #fef2f2; color: #991b1b; }
        .alert-info { background: #eff6ff; color: #1e40af; }
        .alert-warning { background: #fffbeb; color: #92400e; }

        .badge {
            font-weight: 500;
            padding: .35em .75em;
            border-radius: 6px;
        }
        .badge.bg-success { background: var(--primary-soft) !important; color: var(--primary-dark); }
        .badge.bg-warning { background: #fffbeb !important; color: #92400e; }

        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background: var(--gray-50);
            color: var(--gray-600);
            font-weight: 600;
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom: 2px solid var(--gray-200);
            padding: .75rem 1rem;
        }
        .table tbody td {
            padding: .75rem 1rem;
            vertical-align: middle;
            border-color: var(--gray-100);
        }

        footer {
            background: var(--gray-900) !important;
            color: var(--gray-400);
            padding: 1.5rem 0;
            margin-top: auto;
        }
        footer a { color: var(--gray-400); text-decoration: none; }
        footer a:hover { color: #fff; }

        .section-title {
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1.5rem;
        }
        .text-muted { color: var(--gray-500) !important; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in { animation: fadeIn .4s ease-out; }

        @media (max-width: 768px) {
            main { padding: 1rem 0; }
            .navbar { padding: .5rem 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
                <i class="bi bi-trophy-fill me-2"></i>Ayotanding
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    @auth
                        @php $role = auth()->user()->role; @endphp
                        <li class="nav-item"><a class="nav-link" href="{{ route('main') }}"><i class="bi bi-grid me-1"></i>Main</a></li>

                        @if($role === 'user' || $role === 'owner')
                            <li class="nav-item"><a class="nav-link" href="{{ route('keranjang') }}"><i class="bi bi-cart me-1"></i>Keranjang</a></li>
                        @endif

                        @if($role === 'owner' || $role === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('daftarkan-lapangan') }}"><i class="bi bi-plus-square me-1"></i>Daftarkan</a></li>
                        @endif

                        @if($role === 'user')
                            <li class="nav-item"><a class="nav-link" href="{{ route('tiket') }}"><i class="bi bi-ticket me-1"></i>Tiket</a></li>
                        @endif

                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"><i class="bi bi-person me-1"></i>Profil</a></li>

                        @if($role === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield me-1"></i>Admin</a></li>
                        @endif

                        <li class="nav-item ms-lg-1">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm px-3"><i class="bi bi-box-arrow-right me-1"></i>Keluar</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                        <li class="nav-item ms-lg-1">
                            <a class="btn btn-light btn-sm px-3" href="{{ route('register') }}"><i class="bi bi-person-plus me-1"></i>Daftar</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show animate-in" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show animate-in" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-info alert-dismissible fade show animate-in" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small">&copy; {{ date('Y') }} Ayotanding. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <span class="small">Dibuat oleh <a href="#">M. Nabil Maulana</a> &amp; <a href="#">M. Habil Aswad</a></span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const nav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 20);
        });
    </script>
    @stack('scripts')
</body>
</html>
