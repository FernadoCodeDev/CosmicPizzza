 <!--footer-->
 <footer class="Footer-NavyBlue">

     <nav class="navigation-footer-Secondary">
     <a href="/">Menú</a>
            <?php if ($auth): ?>
                <a href="/Reservation">Reservación</a>
            <?php endif ?>
            <a href="/us">Nosotros</a>
            <?php if (!$auth): ?>
                <a href="/Register">Iniciar sesión</a> <!-- Mostrar solo si no ha iniciado sesión -->
            <?php else: ?>
                <a href="/logout">Cerrar sesión</a> <!-- Mostrar solo si ha iniciado sesión -->
                <a href="/DeleteAccount">Eliminar Cuenta</a> 
                <?php endif; ?>
     </nav>

     <!--Icon-->
     <?php include_once __DIR__ . "/../templates/icon.php"; ?>


 </footer>