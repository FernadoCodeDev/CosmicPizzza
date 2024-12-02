<!--footer-->
<footer class="Footer-CrimsonRed">

    <nav class="navegacion-footer">
    <a href="#appMenu">Menú</a>  
            <?php if ($auth): ?>
                <a href="/Reservation">Reservación</a>
            <?php endif ?>
            <a href="/us">Nosotros</a>
            <?php if (!$auth): ?>
                <a href="/Register">Iniciar sesión</a>
            <?php else: ?>
                <a href="/logout">Cerrar sesión</a> 
                <a href="/DeleteAccount">Eliminar Cuenta</a> 
            <?php endif; ?>
    </nav>

    
    <?php include_once __DIR__ . "/../templates/icon.php"; ?>


</footer>