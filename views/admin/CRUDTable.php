<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>


<h1>ADMINISTRADOR CRUD DEL MESAS </h1>
<p><span class="TextElectricBlue">Crear,</span><span class="TextMustard"> Editar</span> y <span class="TextCrimsonRed">Eliminar</span> </p>


<div class="button-option">
    <a href="/Admin">
        <button class="BTGoback">Regresar</button>
    </a>

    <a href="/CreateTable">
        <button class="BTCreate">Crear</button>
    </a>
</div>


<div class="TableContainer">
    <?php if (isset($product) && !empty($product)) { ?>
        <?php foreach ($product as $producto) { ?>
            <div class="TableOfContents">
                <img class="TableImage" src="ImagenBD/<?php echo htmlspecialchars($producto->imagen); ?>" alt="<?php echo htmlspecialchars($producto->imagen); ?>">
                <p class="DescriptionTable"><?php echo htmlspecialchars($producto->descripcion); ?></p>
                <div class="UpdateAndDelete">
                    <a href="/UpdateTable?id=<?php echo htmlspecialchars($producto->id); ?>"> <!--Update donde se tiene que llevar estos datos-->
                        <button class="BTUpdate">Actualizar</button>
                    </a>

                    <form action="/CRUDTable" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->id); ?>">
                        <button class="BTDelete">Eliminar</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p><?php echo $NoProduct; ?></p>
    <?php } ?>
</div>

<?php include_once __DIR__ . "/../templates/FooterSecundario.php" ?>

<script src="build/js/bundle.min.js"></script>

</body>

</html>