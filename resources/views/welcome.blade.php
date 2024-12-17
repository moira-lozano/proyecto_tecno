<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce - COIMTEC Soluciones Informáticas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: #333;
        }

        header {
            background-color: #1f2937;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        nav a {
            color: white;
            margin-left: 15px;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #60a5fa;
        }

        .hero {
            background: linear-gradient(to right, #4f46e5, #3b82f6);
            color: white;
            text-align: center;
            padding: 60px 20px;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .products {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .products h3 {
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 30px;
            color: #1f2937;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card .content {
            padding: 15px;
        }

        .product-card h4 {
            font-size: 1.2rem;
            margin-bottom: 5px;
            color: #1f2937;
        }

        .product-card p {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 10px;
        }

        .product-card .price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #4f46e5;
        }

        .product-card .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .product-card .btn:hover {
            background-color: #3b82f6;
        }

        footer {
            background: #1f2937;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>COIMTEC Soluciones Informáticas</h1>
        <nav>
            <a href="{{ route('login') }}">Iniciar sesión</a>
            {{-- <a href="{{ view('register') }}">Registrarse</a> --}}
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Registrarse
            </a>

        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h2>Ecommerce de Licencias de Software</h2>
        <p>Compra licencias de software de manera rápida, segura y confiable.</p>
    </section>

    <!-- Products Section -->
    <section class="products">
        <h3>Nuestras Licencias</h3>
        <div class="product-grid">
            <!-- Product Card -->
            <div class="product-card">
                {{-- <img src="https://via.placeholder.com/300x200" alt="Microsoft Office 365"> --}}
                
                <img src="https://brandemia.org/contenido/subidas/2022/10/microsoft-365.png" alt="Microsoft Office 365">
                <div class="content">
                    <h4>Microsoft Office 365</h4>
                    <p>Licencia anual para uso personal y profesional.</p>
                    <div class="price">$99.99</div>
                    <a href="#" class="btn">Añadir al carrito</a>
                </div>
            </div>

            <!-- Product Card -->
            <div class="product-card">
                {{-- <img src="https://via.placeholder.com/300x200" alt="Adobe Photoshop CC"> --}}
                
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7vR6qPdZ-vropmt4QaYV26Pg86HYqEHYKlQ&s" alt="Adobe Photoshop CC">
                <div class="content">
                    <h4>Adobe Photoshop CC</h4>
                    <p>Herramientas avanzadas de edición de imágenes.</p>
                    <div class="price">$199.99</div>
                    <a href="#" class="btn">Añadir al carrito</a>
                </div>
            </div>

            <!-- Product Card -->
            <div class="product-card">
                {{-- <img src="https://via.placeholder.com/300x200" alt="Antivirus McAfee"> --}}
                
                <img src="https://antivirusbolivia.com/wp-content/uploads/McAfee-Total-Protection.jpg" alt="Antivirus McAfee">
                <div class="content">
                    <h4>Antivirus McAfee Total Protection</h4>
                    <p>Protege tus dispositivos de virus y malware.</p>
                    <div class="price">$49.99</div>
                    <a href="#" class="btn">Añadir al carrito</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        &copy; 2024 COIMTEC Soluciones Informáticas. Todos los derechos reservados.
    </footer>
</body>
</html>
