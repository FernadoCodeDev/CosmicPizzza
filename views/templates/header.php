<?php
if (!isset($_SESSION)) {
    //session_start(); // Iniciar sesión
}

$auth = $_SESSION['login'] ?? null;
$nombre = $_SESSION['nombre'] ?? '';
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

<body>
    <?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>

    <header class="Header">
        <div class="spaceBetween">
            <a href="/">
                <img src="Image/Cosmic Pizza Logo.webp" class="CosmicPizza" alt="CosmicPizza Logo">
            </a>

            <?php include_once __DIR__ . "/../templates/DarkModeButtom.php"; ?>
        </div>

        <div class="mobile-menu">
            <img src="Image/mobile menu.webp" alt="Mobile Menu">
        </div>

        <nav class="navegacion">
            <a href="#appMenu">Menú</a>
            <a href="/Reservation">Reservación</a>
            <a href="/us">Nosotros</a>
            <?php if (!$auth): ?>
                <a href="/Register">Iniciar sesión</a>
            <?php else: ?>
                <a href="/logout">Cerrar sesión</a>
                <a href="/CloseSession">Eliminar sesión</a>

            <?php endif; ?>
        </nav>

        <h1 class="Qualification">Bienvenido a Cosmic Pizza</h1>

        <div class="Information-and-image">
            <p><?php if ($auth): ?><?php echo $nombre; ?>, <?php endif; ?>¡Bienvenido a CosmicPizza! Disfruta de nuestras deliciosas pizzas con ingredientes de otro mundo, preparadas para llevarte en un viaje por el cosmos. ¡Explora nuestro menú y encuentra tu próxima misión espacial en cada bocado!</p>

            <img src="Image/Images.webp" alt="Images" class="Images">
        </div>

        <img src="Image/Background.webp" alt="Background" class="main-fund">

    </header>