<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

<?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "../../templates/alertas.php"; ?>
    <?php endif; ?>

<h1>Crear nuevo Producto</h1>

<div class="button-option">
    <a href="/CRUDMenu">
        <button class="BTGoback">Regresar</button>
    </a>

</div>

<div class="NewProduct">
<form action="/CreateMenu" method="POST" enctype="multipart/form-data">

        <div class="image-upload">
            <label for="imagen">
                <img
                    src="Image/Upload image icon.webp"
                    class="ImageUpload"
                    alt="Haz clic para subir una imagen">
            </label>
            <input id="imagen" name="imagen" type="file" accept="imagen/*"  hidden required>
        </div>

        <div class="TitleandOptions">
            <input type="text" name="nombre" id="nombre" class="NameProduct" placeholder="Nombre del Producto" required>
            <select name="tipo" id="tipo" class="type" required>
                <option value="" selected disabled>Seleccionar Categoria</option>
                <option value="promocion">Promoción</option>
                <option value="pizza">Pizza</option>
                <option value="complemento">Complemento</option>
                <option value="postre">Postre</option>
            </select>
        </div>

        <textarea class="Description" name="descripcion" id="descripcion" placeholder="Descripción" required></textarea>
        <input type="number" class="Price" name="precio" id="precio" min="1" placeholder="Precio ($)" required>

        <button type="submit" class="BTCreate">Crear Producto</button>
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