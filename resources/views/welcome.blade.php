<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: center;
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            color:rgb(7, 3, 3);
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #ddd;
            border-radius: 10px;
            color: rgb(0, 0, 0);
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .carousel-inner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .card {
            margin: 20px;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card:hover {
            transform: scale(1.05) translateZ(0);
            background-color: 300px;
        }

        .card:not(:hover) {
            /* filter: brightness(0.9) saturate(0.9) contrast(1.2) blur(20px); */
        }
    </style>
</head>

<body>
    <span>
        <div class="navbar">
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>

        <div>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/gambar1.jpg') }}" class="d-block w-100" alt="gambar 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/gambar2.jpg') }}" class="d-block w-100" alt="gambar 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/gambar3.jpg') }}" class="d-block w-100" alt="gambar 3">
                    </div>
                </div>

                <!-- Navigasi -->
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        
            @include('components.product-cards')
        </div>
    </span>

    <footer class="bg-light text-center py-3">
        <p>&copy; 2025 My Website. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>