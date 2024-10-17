<?php
session_start();
require 'conexion.php'; // Asegúrate de que este archivo contenga la conexión PDO

// Verificar si hay una sesión activa
if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];
    
    // Actualizar la hora del último inicio de sesión
    $currentTime = time();
    $stmt = $cnnPDO->prepare("UPDATE usuarios SET last_login = FROM_UNIXTIME(?) WHERE email = ?");
    $stmt->execute([$currentTime, $userEmail]);

    // Cerrar la sesión
    session_unset(); // Destruye todas las variables de sesión
    session_destroy(); // Destruye la sesión
    
    // Marcar cierre de sesión en localStorage
    echo "<script>localStorage.setItem('logout', 'true'); window.location.href = 'index.php';</script>";
    exit();
}
?>

<?php
// Evitar caché del navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
