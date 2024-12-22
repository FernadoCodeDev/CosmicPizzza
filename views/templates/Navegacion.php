<?php
if (!isset($_SESSION)) {
    //session_start(); // Iniciar sesión
}

$auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Image/Cosmic Pizza Logo Web.webp" type="image/webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/build/css/app.css">

    <title>Cosmic Pizza</title>
</head>

<header class="header-Navegacion">
    <div class="contenido-header">

        <div class="spaceBetween">
            <a href="/">
                <img src="Image/Cosmic Pizza Logo.webp" class="CosmicPizza" alt="Cosmic Pizza Logo">
            </a>
            <?php include_once __DIR__ . "/../templates/DarkModeButtom.php"; ?>

        </div>

        <div class="mobile-menu">
            <img src="Image/mobile menu.webp" alt="Mobile Menu">
        </div>

        <nav class="navegacion">
            <a href="/">Menú</a>
            <a href="/Reservation">Reservación</a>
            <a href="/us">Nosotros</a>
            <?php if (!$auth): ?>
                <a href="/Register">Iniciar sesión</a>
            <?php else: ?>
                <a href="/logout">Cerrar sesión</a> 
                <a href="/CloseSession">Eliminar Cuenta</a>
            <?php endif; ?>
        </nav>
    </div>
</header>