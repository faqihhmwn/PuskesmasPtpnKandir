<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Vertical Navigation</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .underline-center {
      width: 140px;
      height: 4px;
      background-color: #333;
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
      width: 200px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #2E7D32;
      padding-top: 20px;
      transition: transform 0.3s ease-in-out;
    }

    .sidenav a {
      padding: 12px 16px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
      transition: background-color 0.3s;
    }

    .sidenav a:hover {
      background-color: #4CAF50;
    }

    .sidenav a.active {
      background-color: #66BB6A;
      font-weight: bold;
    }

    .user-name {
      display: block;
      text-align: end;
      margin-left: 200px;
      padding: 10px;
      background-color: rgb(69, 221, 77);
    }

    .content {
      margin-left: 200px;
      padding: 20px;
      background-color: #E9F5EC;
    }

    /* Hamburger menu */
    .menu-toggle {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      background-color: #2E7D32;
      color: white;
      padding: 10px 12px;
      border: none;
      font-size: 20px;
      z-index: 1001;
      border-radius: 4px;
    }

    /* Responsive rules */
    @media screen and (max-width: 768px) {
      .sidenav {
        transform: translateX(-100%);
        width: 180px;
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
    background-color: #3e8e41;
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
    background-color: #66BB6A;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
  }

  /* Optional untuk tampil vertikal */
  .nav-item {
    position: relative;
  }

  .dropdown-toggle {
    cursor: pointer;
  }
  </style>
</head>

<body>

  <button class="menu-toggle" onclick="toggleSidebar()">☰</button>

  <div class="sidenav" id="sidenav">
    <h1 style="text-align:center; color: white;">Dashboard</h1>
    <div class="underline-center"></div>
    <div class="logo">
      <img src="{{ asset('images/kementerian-kesehatan.jpg') }}" alt="Logo" onclick="handleLogoClick()">
    </div>

<div class="nav-item">
  <a href="/content/home" class="active">Home</a>
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

<div class="nav-item">
  <a href="/content/contact">Farmasi</a>
</div>

  </div>

  @auth
  <div class="user-name">
    <h3>Hallo, <span id="user-name">{{ Auth::user()->name }}</span>!</h3>
  </div>
  @else
  <div class="user-name">
    <h3>Hallo, <span id="user-name">Riski Sembiring</span>!</h3>
  </div>
  @endauth

  <div class="content">
    <div id="content"></div>
  </div>

  <script>
    const navLinks = document.querySelectorAll('.sidenav a');
    const content = document.getElementById('content');
    const sidenav = document.getElementById('sidenav');

    function loadContent(url) {
      fetch(url)
        .then(res => res.text())
        .then(data => {
          content.innerHTML = data;
        })
        .catch(err => {
          content.innerHTML = '<p>Gagal memuat konten.</p>';
        });
    }

    function handleLogoClick() {
      navLinks.forEach(link => link.classList.remove('active'));
      document.querySelector('.sidenav a[href="/content/home"]')?.classList.add('active');
      loadContent('/content/home');
    }

    navLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        navLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
        loadContent(this.getAttribute('href'));
        closeSidebar(); // otomatis tutup di mobile
      });
    });

    function toggleSidebar() {
      sidenav.classList.toggle('open');
    }

    function closeSidebar() {
      if (window.innerWidth <= 768) {
        sidenav.classList.remove('open');
      }
    }

    window.addEventListener('DOMContentLoaded', () => {
      loadContent('/content/home');
    });
  </script>
</body>

</html>
