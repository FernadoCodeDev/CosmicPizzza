<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

<?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>

<h1>Actualizar mesa</h1>

<div class="button-option">
    <a href="/CRUDTable">
        <button class="BTGoback">Regresar</button>
    </a>

</div>

<div class="NewTable">
<form action="/UpdateTable" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->id); ?>">

<div class="column">
    <div class="image-upload">
        <label for="imagen">
            <img
                src="ImagenBD/<?php echo htmlspecialchars($producto->imagen); ?>"
                class="ImageUpload"
                alt="Haz clic para subir una imagen">
        </label>
        <input id="imagen" name="imagen" type="file" accept="imagen/*"  hidden required>
    </div>

    <textarea class="Description" name="descripcion" id="descripcion" placeholder="Descripción" required><?php echo htmlspecialchars($producto->descripcion); ?></textarea>
    <button type="submit" class="BTCreate">Actualizar Producto</button>
</div>
    </form>
</div>

<?php include_once __DIR__ . "/../templates/FooterSecundario.php" ?>

<script src="build/js/bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        uploadImage();
    });
</script>

</body>

</html>