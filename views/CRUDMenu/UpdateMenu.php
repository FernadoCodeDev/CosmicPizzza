<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

 <?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>


<h1>Editar Producto</h1>

<div class="button-option">
    <a href="/CRUDMenu">
        <button class="BTGoback">Regresar</button>
    </a>
</div>

<div class="NewProduct">
    <form action="/UpdateMenu" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->id); ?>"> 

        <div class="image-upload">
            <label for="imagen">
                <img
                    src="ImagenBD/<?php echo htmlspecialchars($producto->imagen); ?>"
                    class="ImageUpload"
                    alt="Imagen del producto">
            </label>
            <input id="imagen" name="imagen" type="file" accept="image/*" hidden >
        </div>

        <div class="TitleandOptions">
            <input type="text" name="nombre" id="nombre" class="NameProduct"
                   value="<?php echo htmlspecialchars($producto->nombre); ?>" required> 
            <select name="tipo" id="tipo" class="type" required>
                <option value="" disabled>Seleccionar Categoría</option>
                <option value="promocion" <?php echo $producto->tipo === 'promocion' ? 'selected' : ''; ?>>Promoción</option> 
                <option value="pizza" <?php echo $producto->tipo === 'pizza' ? 'selected' : ''; ?>>Pizza</option> 
                <option value="complemento" <?php echo $producto->tipo === 'complemento' ? 'selected' : ''; ?>>Complemento</option> 
                <option value="postre" <?php echo $producto->tipo === 'postre' ? 'selected' : ''; ?>>Postre</option> 
            </select>
        </div>

        <textarea class="Description" name="descripcion" id="descripcion" placeholder="Descripción" required><?php echo htmlspecialchars($producto->descripcion); ?></textarea> 
        <input type="number" class="Price" name="precio" id="precio" placeholder="Precio"
               value="<?php echo htmlspecialchars($producto->precio); ?>" required> 

        <button type="submit" class="BTCreate">Actualizar Producto</button>
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