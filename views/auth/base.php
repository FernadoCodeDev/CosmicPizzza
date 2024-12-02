<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

<?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "../../templates/alertas.php"; ?>
    <?php endif; ?>

<h1>Fuentes de letras</h1>
<div class="fonts">

    <h1 class="FontHighdream">FontHighdream</h1>
    <h1 class="FontHighmont">FontHighmont</h1>
</div>




<?php include_once __DIR__ . "/../templates/FooterSecundario.php" ?>

<script src="build/js/bundle.min.js"></script>

</body>

</html>