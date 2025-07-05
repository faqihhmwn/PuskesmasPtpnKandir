<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard Puskesmas')</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f0f7ff;
    }

    .underline-center {
      width: 140px;
      height: 4px;
      background-color: #003f66;
      margin: 10px auto 20px;
    }

    .logo img {
      display: block;
      margin: 0 auto 10px;
      width: 100px;
      height: 100px;
      border-radius: 10%;
      cursor: pointer;
    }

    .sidenav {
      height: 100vh;
      width: 220px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #005f99;
      padding-top: 20px;
      transition: transform 0.3s ease-in-out;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
      overflow-y: auto;
    }

    .sidenav a {
      padding: 12px 18px;
      text-decoration: none;
      font-size: 16px;
      color: white;
      display: block;
      transition: background-color 0.3s;
    }

    .sidenav a:hover {
      background-color: #0077c0;
    }

    .sidenav a.active {
      background-color: #004f80;
      font-weight: 600;
    }

    .user-name {
      display: block;
      text-align: end;
      margin-left: 220px;
      padding: 12px;
      background-color: #004f80;
      color: white;
    }

    .content {
      margin-left: 220px;
      padding: 24px;
      background-color: #f0f7ff;
      min-height: 100vh;
    }

    .menu-toggle {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      background-color: #005f99;
      color: white;
      padding: 10px 12px;
      border: none;
      font-size: 20px;
      z-index: 1001;
      border-radius: 4px;
    }

    @media screen and (max-width: 768px) {
      .sidenav {
        transform: translateX(-100%);
        width: 200px;
      }

      .sidenav.open {
        transform: translateX(0);
      }

      .menu-toggle {
        display: block;
      }

      .user-name,
      .content {
        margin-left: 0;
      }
    }

    .dropdown {
      position: relative;
    }

    .dropdown-menu {
      display: none;
      background-color: #0077c0;
      position: absolute;
      left: 0;
      top: 100%;
      z-index: 1;
      min-width: 180px;
    }

    .dropdown-menu a {
      color: white;
      padding: 10px 16px;
      display: block;
      text-decoration: none;
    }

    .dropdown-menu a:hover {
      background-color: #005f99;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .nav-item {
      position: relative;
    }

    .dropdown-toggle {
      cursor: pointer;
    }

    /* Additional styles for obat pages */
    .card {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border: none;
      border-radius: 10px;
    }

    .btn {
      border-radius: 8px;
    }

    .table {
      border-radius: 10px;
      overflow: hidden;
    }

    .alert {
      border-radius: 10px;
      border: none;
    }
  </style>
</head>

<body>

  <button class="menu-toggle" onclick="toggleSidebar()">☰</button>

  <div class="sidenav" id="sidenav">
    <h1 style="text-align:center; color: white; font-size: 22px;">Dashboard</h1>
    <div class="underline-center"></div>
    <div class="logo">
      <img src="{{ asset('images/kementerian-kesehatan.jpg') }}" alt="Logo" onclick="handleLogoClick()">
    </div>

    <div class="nav-item">
      <a href="/content/home">Home</a>
    </div>

    <div class="nav-item">
      <a href="/content/data-pengguna">Data Pengguna</a>
    </div>

    <div class="nav-item dropdown">
      <a href="/content/data-pasien" class="dropdown-toggle">Data Pasien</a>
      <div class="dropdown-menu">
        <a href="/content/about/struktur">Registrasi Berobat</a>
        <a href="/content/about/visi-misi">Info Data Pasien</a>
      </div>
    </div>

    <div class="nav-item">
      <a href="/content/contact">Rekam Medis</a>
    </div>

    <div class="nav-item dropdown">
      <a href="#" class="dropdown-toggle {{ request()->routeIs('obat.*') ? 'active' : '' }}">Farmasi</a>
      <div class="dropdown-menu">
        <a href="{{ route('obat.index') }}" class="{{ request()->routeIs('obat.index') ? 'active' : '' }}">Dashboard Obat</a>
        <a href="{{ route('obat.rekapitulasi') }}" class="{{ request()->routeIs('obat.rekapitulasi') ? 'active' : '' }}">Rekapitulasi Obat</a>
        <a href="{{ route('obat.create') }}" class="{{ request()->routeIs('obat.create') ? 'active' : '' }}">Tambah Obat</a>
      </div>
    </div>

    <div class="nav-item">
      <a href="/content/rekap-biaya">Rekapitulasi Biaya</a>
    </div>
  </div>

  @auth
  <div class="user-name">
    <h3>Halo, <span id="user-name">{{ Auth::user()->name }}</span>!</h3>
  </div>
  @else
  <div class="user-name">
    <h3>Halo, <span id="user-name">Hikame</span>!</h3>
  </div>
  @endauth

  <div class="content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function toggleSidebar() {
      document.getElementById('sidenav').classList.toggle('open');
    }

    function closeSidebar() {
      if (window.innerWidth <= 768) {
        document.getElementById('sidenav').classList.remove('open');
      }
    }

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert-dismissible');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
  </script>
</body>

</html>
