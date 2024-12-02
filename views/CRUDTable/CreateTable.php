<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

<?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>

<h1>Crear nueva mesa</h1>

<div class="button-option">
    <a href="/CRUDTable">
        <button class="BTGoback">Regresar</button>
    </a>

</div>

<div class="NewTable">
<form action="/CreateTable" method="POST" enctype="multipart/form-data">

<div class="column">
    <div class="image-upload">
        <label for="imagen">
            <img
                src="Image/Upload image icon.webp"
                class="ImageUpload"
                alt="Haz clic para subir una imagen">
        </label>
        <input id="imagen" name="imagen" type="file" accept="imagen/*"  hidden required>
    </div>

    <textarea class="Description" name="descripcion" id="descripcion" placeholder="Descripción" required></textarea>
    <button type="submit" class="BTCreate">Crear Producto</button>
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