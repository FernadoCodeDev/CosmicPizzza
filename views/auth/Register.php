<!doctype html>
<html lang="en">

<head>
    <title>Webleb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/app.css">

</head>

<body class="Body-Register">

    <?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>

    <img src="Image/BackgroundPizza.webp" alt="BackgroundPizza" class="background-image" />

<form action="/Register" method="post">
    <div class="inner-container">
        <div class="box">
            <h1>Registro</h1>
            <input type="text" name="nombre" placeholder="nombre" value="<?php echo s($usuario->nombre); ?>"/>
            <input type="email" name="email" placeholder="email" value="<?php echo s($usuario->email); ?>"/>
            <input type="password" name="password" placeholder="Password" />

            <button>Registarse</button>
            <p>Ya te registraste? <a class="signup" href="/Login">Acceder</a></p>
            <p>Olvidaste tú contraseña? <a class="Forget" href="/Forget">Recuperar</a></p>


        </div>
    </div>
</form>


</body>

</html>