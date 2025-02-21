<?php include_once __DIR__ . "/../templates/Navegacion.php"; ?>

<body>

    <div class="Reservation-Information">
        <h1>Crear Una Reservación</h1>
        <p>Elege tú Mesa y coloca tús datos</p>
    </div>

    <div id="app" class="Steps">
        <nav class="tabs">
            <!--PAGINADOR-->
            <button class="Current" type="button" data-step="1">Mesas</button>
            <button type="button" data-step="2">Datos</button>
            <button type="button" data-step="3">Resumen</button>
        </nav>

        <div id="Step-1" class="seccion">
            <h2>Mesas</h2>
            <p>Elige tu Mesa a continuación</p>
            <div id="Mesas" class="Listado-Mesas"></div>
        </div>

        <div id="Step-2" class="seccion">
            <h2>Datos y Reservación</h2>
            <p>Coloca tus datos y fecha de tú reservación</p>
            <div id="alertas-step-2"></div> <!--Alertas -->

            <form action="" class="form-step2">
                <div>
                    <label for="nombre">nombre</label>
                    <input type="text" id="nombre" value="<?php echo $nombre; ?>" disabled> <!-- No usa disabled para que puedan ver como funciona el sistema de lo contrario nunca lo podran usar / Don't use disabled so they can see how the system works otherwise they will never be able to use it. -->

                </div>
                <div>
                    <label for="fecha">fecha</label>
                    <input type="date" id="fecha" min="<?php echo date('Y-m-d', strtotime('+2 day')); ?>">
                </div>
                <div>
                    <label for="hora">hora</label>
                    <input type="time" id="hora" min="09:00" max="22:00">
                </div>
                <input type="hidden" id="id" value="<?php echo $id; ?>">
            </form>
        </div>

        <div id="Step-3" class="seccion">
            <h2>Resumen</h2>
            <p>Verifica que la información sea correcta</p>
            <div id="alertas-step-3"></div> <!--Alertas -->

            <div id="ShowSummary" class=""></div>
        </div>
    </div>


    <?php include_once __DIR__ . "/../templates/FooterSecundario.php"; ?>

    <script src="/build/js/bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>