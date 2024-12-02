<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="src/Image/Cosmic Pizza Logo Web.webp" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/build/css/app.css">

    <title>Cosmic Pizza</title>
</head>

<body class="Body-Register">

    <?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>

    <img src="Image/BackgroundPizza.webp" alt="BackgroundPizza" class="background-image" />

<form action="/Forget" method="post">
    <div class="inner-container">
        <div class="box">
            <h1>Olvide Mí Contraseña</h1>
            <p>Restablece tu password escribiendo tú email en siguiente campo</p>
            <input type="email" name="email" placeholder="Email" />

            <button>Recuperar password</button>
        </div>
    </div>
</form>


</body>

</html>