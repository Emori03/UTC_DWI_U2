<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isAuthenticated() {
    // Verifica si el usuario está autenticado
    return isset($_SESSION['email']);
}

function hasRole($role) {
    // Verifica si el usuario tiene el rol adecuado
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

// Protege una ruta específica
function protectRoute($role) {
    if (!isAuthenticated() || !hasRole($role)) {
        header("Location: login.php");
        exit();
    }
}
?>
