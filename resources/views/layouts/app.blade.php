<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rekapitulasi')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1 style="padding: 20px; background-color: #0077c0; color: white;">PUSKESMAS PTPN KANDIR</h1>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer style="margin-top: 40px; padding: 10px; background: #f3f3f3; text-align: center;">
        &copy; 2025 PTPN 7 - All Rights Reserved.
    </footer>
</body>
</html>
