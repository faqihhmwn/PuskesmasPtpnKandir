<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Sistem Manajemen Obat Puskesmas</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar-brand {
            font-weight: bold;
        }
        
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #0077c0 0%, #005a8b 100%);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 8px;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        
        .main-content {
            padding: 20px;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-1px);
        }
        
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        
        .badge {
            font-size: 0.75em;
            padding: 6px 12px;
            border-radius: 20px;
        }
        
        .alert {
            border: none;
            border-radius: 10px;
            padding: 15px 20px;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #0077c0;
            box-shadow: 0 0 0 0.2rem rgba(0, 119, 192, 0.25);
        }
        
        .text-primary {
            color: #0077c0 !important;
        }
        
        .bg-primary {
            background-color: #0077c0 !important;
        }
        
        .btn-primary {
            background-color: #0077c0;
            border-color: #0077c0;
        }
        
        .btn-primary:hover {
            background-color: #005a8b;
            border-color: #005a8b;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('obat.dashboard') }}">
                <i class="fas fa-hospital"></i> Puskesmas PTPN Kandir
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i> Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar">
                    <div class="p-3">
                        <h6 class="text-white-50 mb-3">MENU UTAMA</h6>
                        <nav class="nav flex-column">
                            <a class="nav-link" href="/dashboard">
                                <i class="fas fa-home"></i> Kembali ke Dashboard
                            </a>
                        </nav>
                        
                        <h6 class="text-white-50 mb-3 mt-4">FARMASI</h6>
                        <nav class="nav flex-column">
                            <a class="nav-link {{ request()->routeIs('obat.index') ? 'active' : '' }}" 
                               href="{{ route('obat.index') }}">
                                <i class="fas fa-list"></i> Daftar Obat
                            </a>
                            <a class="nav-link {{ request()->routeIs('obat.rekapitulasi') ? 'active' : '' }}" 
                               href="{{ route('obat.rekapitulasi') }}">
                                <i class="fas fa-chart-bar"></i> Rekapitulasi Obat
                            </a>
                            <a class="nav-link {{ request()->routeIs('obat.create') ? 'active' : '' }}" 
                               href="{{ route('obat.create') }}">
                                <i class="fas fa-plus"></i> Tambah Obat
                            </a>
                        </nav>
                        
                        <h6 class="text-white-50 mb-3 mt-4">LAPORAN</h6>
                        <nav class="nav flex-column">
                            <a class="nav-link" href="{{ route('obat.export', ['periode' => 1]) }}">
                                <i class="fas fa-file-excel"></i> Export Excel
                            </a>
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#importModal">
                                <i class="fas fa-file-import"></i> Import Data
                            </a>
                        </nav>
                        
                        <h6 class="text-white-50 mb-3 mt-4">LAINNYA</h6>
                        <nav class="nav flex-column">
                            <a class="nav-link" href="/content/data-pengguna">
                                <i class="fas fa-users"></i> Data Pengguna
                            </a>
                            <a class="nav-link" href="/content/data-pasien">
                                <i class="fas fa-user-injured"></i> Data Pasien
                            </a>
                            <a class="nav-link" href="/content/rekap-biaya">
                                <i class="fas fa-calculator"></i> Rekap Biaya
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert-dismissible');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Confirm delete actions
        document.addEventListener('click', function(e) {
            if (e.target.matches('[onclick*="confirm"]')) {
                e.preventDefault();
                if (confirm('Apakah Anda yakin ingin melakukan tindakan ini?')) {
                    e.target.closest('form').submit();
                }
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
