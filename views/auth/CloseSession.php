<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

<?php if (isset($alertas) && !empty($alertas)): ?>
    <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
<?php endif; ?>

<div class="DeleteAccount">
    <a href="/">
        <button class="BTGoback">Regresar</button>
    </a>
    
    <h1>Eliminar Cuenta</h1>
    <p>Al precionar el bóton se eliminara tú cuenta <span class="SpanDelete">Gracias por visitar Cosmic Pizza :)</span></p>
    
    <form action="/CloseSession" method="POST">
        <input type="hidden" name="user_id" value="<?php echo ($id); ?>">
        <button type="submit" class="BTDeleteAccount">Eliminar cuenta</button>
    </form>
</div>


<?php include_once __DIR__ . "/../templates/FooterSecundario.php" ?>

<script src="build/js/bundle.min.js"></script>