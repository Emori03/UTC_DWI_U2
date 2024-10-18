<?php
session_start();
require 'conexion.php'; // Asegúrate de que este archivo contenga la conexión PDO
require 'auth.php';
protectRoute('admin'); // Solo usuarios con rol 'admin' pueden acceder

// Verificar si el usuario está autenticado y es un administrador
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

date_default_timezone_set('America/Monterrey');
$lastLogin = isset($_SESSION['last_login']) ? date('d-m-Y H:i:s', $_SESSION['last_login']) : 'Nunca';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function updateLastLogin() {
            fetch('get_last_login.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('last-login').textContent = data;
                });
        }

        document.addEventListener('DOMContentLoaded', updateLastLogin);
    </script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
        <p>Último inicio de sesión: <span id="last-login"><?php echo $lastLogin; ?></span></p>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>
</body>
</html>
