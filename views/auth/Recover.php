<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="src/Image/Cosmic Pizza Logo Web.webp" type="image/webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/build/css/app.css">

    <title>Cosmic Pizza</title>
</head>

<body class="Body-Register">

    <?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>

    <?php if($error) return null; ?>

    <img src="Image/BackgroundPizza.webp" alt="BackgroundPizza" class="background-image" />

<form method="post">
    <div class="inner-container">
        <div class="box">
            <h1>Recupear password</h1>
            <p>Coloca Tú Nuevo Password</p>
            <input type="password" name="password" placeholder="Tú Nuevo Password" />
            <button>Guardar password</button>
        </div>
    </div>
</form>


</body>

</html>