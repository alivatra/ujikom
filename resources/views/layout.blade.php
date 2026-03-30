<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Sistem Manajemen Buku</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Theme Colors */
        :root {
            --cream: #f8e8d0;
            --cream-dark: #e8d3b5;
            --cream-light: #fdf6ec;
            --white-smoke: #f5f5f5;
            --text-dark: #2c3e50;
            --text-muted: #6c757d;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
        }

        body {
            background-color: var(--white-smoke);
            min-height: 100vh;
        }

        /* Navbar Styling */
        .navbar-custom {
            background: linear-gradient(135deg, var(--cream) 0%, var(--cream-dark) 100%);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            color: var(--text-dark) !important;
            font-weight: 700;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        /* Card Styling */
        .card-custom {
            background: white;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
        }

        /* Button Styles */
        .btn-cream {
            background: linear-gradient(135deg, var(--cream) 0%, var(--cream-dark) 100%);
            color: var(--text-dark);
            border: none;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-cream:hover {
            background: linear-gradient(135deg, var(--cream-dark) 0%, #d4c0a0 100%);
            color: var(--text-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(232, 211, 181, 0.5);
        }

        .btn-outline-cream {
            background: transparent;
            color: var(--text-dark);
            border: 2px solid var(--cream);
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-outline-cream:hover {
            background: var(--cream);
            color: var(--text-dark);
            transform: translateY(-2px);
        }

        /* Table Styling */
        .table-custom {
            border-radius: 15px;
            overflow: hidden;
        }

        .table-custom thead {
            background: linear-gradient(135deg, var(--cream) 0%, var(--cream-dark) 100%);
            color: var(--text-dark);
        }

        .table-custom th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px;
            border: none;
        }

        .table-custom td {
            padding: 15px;
            vertical-align: middle;
            border-color: #f0f0f0;
        }

        .table-custom tbody tr {
            transition: all 0.3s ease;
        }

        .table-custom tbody tr:hover {
            background-color: var(--cream-light);
            transform: scale(1.01);
        }

        /* Form Controls */
        .form-control-custom {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            border-color: var(--cream);
            box-shadow: 0 0 0 4px rgba(248, 232, 208, 0.3);
            outline: none;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        /* Badge Styles */
        .badge-custom {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        /* Alert Styles */
        .alert-custom {
            border: none;
            border-radius: 15px;
            padding: 15px 20px;
            font-weight: 500;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Stats Card */
        .stats-card {
            background: linear-gradient(135deg, var(--cream) 0%, var(--cream-dark) 100%);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(232, 211, 181, 0.4);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* Pagination */
        .pagination-custom .page-link {
            border: none;
            color: var(--text-dark);
            padding: 10px 15px;
            margin: 0 3px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .pagination-custom .page-link:hover {
            background-color: var(--cream);
            color: var(--text-dark);
        }

        .pagination-custom .page-item.active .page-link {
            background-color: var(--cream-dark);
            color: var(--text-dark);
        }

        /* Search Box */
        .search-box {
            position: relative;
        }

        .search-box .bi-search {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .search-box input {
            padding-left: 40px;
            border-radius: 25px;
        }

        /* Action Buttons */
        .btn-action {
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }

        .btn-edit {
            background-color: var(--warning);
            color: var(--text-dark);
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: var(--danger);
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-view {
            background-color: var(--info);
            color: white;
        }

        .btn-view:hover {
            background-color: #138496;
        }

        /* Modal Styling */
        .modal-content-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .modal-header-custom {
            background: linear-gradient(135deg, var(--cream) 0%, var(--cream-dark) 100%);
            border-radius: 20px 20px 0 0;
            padding: 20px;
        }

        /* Footer */
        .footer-custom {
            background: white;
            padding: 20px 0;
            margin-top: 50px;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.05);
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
        }

        .empty-state i {
            font-size: 5rem;
            color: var(--cream-dark);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('buku.index') }}">
                <i class="bi bi-book-half me-2"></i>
                Sistem Daftar Buku
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buku.index') }}">
                            <i class="bi bi-house-door me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buku.create') }}">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Buku
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4 mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer-custom text-center">
        <div class="container">
            <p class="mb-0 text-muted">
                <i class="bi bi-heart-fill text-danger"></i> 
                Sistem Daftar Buku &copy; {{ date('Y') }}
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>

