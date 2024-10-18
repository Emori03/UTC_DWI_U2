<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/stylecar.css"> 
    <style>
        body {
            background-image: url(img/fondo.jpg);
            background-position: center;
            background-repeat: no-repeat; 
            background-size: cover;
            background-attachment: 15px;
            min-height: 100vh;
            background: linear-gradient( rgba(5,7,12,0.75), rgba(5,7,12,0.20)), url(img/fondo.jpg) no-repeat center fixed;
            background-size: cover;
            backdrop-filter: blur(3px);   
        }
        .content {
            color: white;
            text-align: center;
            padding: 50px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mi Tienda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ml-auto">
                <a href="#" class="btn btn-dark mx-1">Inicio</a>
                <a href="registro.php" class="btn btn-outline-dark mx-1">Registrarse</a>
                <a href="login.php" class="btn btn-outline-dark mx-1">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="carousel-container">
        <div class="carousel-slide">
            <img src="https://i.pinimg.com/564x/68/97/d4/6897d4161181f9eb379678089b2c61bb.jpg" alt="Imagen 1">
            <img src="https://i.pinimg.com/564x/99/42/47/9942472e647308dfa001d226bb5afe4f.jpg" alt="Imagen 2">
            <img src="https://i.pinimg.com/564x/b4/15/06/b41506de79fc20f937c1961caf84275a.jpg" alt="Imagen 2">
        </div>
        <!-- Botones de navegación -->
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <div class="content">
        <h1>Bienvenido a Mi Tienda</h1>
        <p>Encuentra los mejores productos aquí</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let currentSlide = 0;

        function moveSlide(direction) {
            const slides = document.querySelector('.carousel-slide');
            const totalSlides = slides.children.length;
            currentSlide += direction;

            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }

            const slideWidth = slides.children[0].clientWidth;
            slides.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        }
    </script>
</body>
</html>
