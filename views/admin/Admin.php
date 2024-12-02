<?php include_once __DIR__ . "/../templates/Navegacion.php"; ?>

<body>

    <div id="appAdmin" class="StepsAdmin">

        <h2 class="AdminPanel">PANEL DE ADMINISTACIÓN</h2>
        <p class="WelcomeAdmin">Bienvenido Administrador <?php echo $nombre ?></p>

        <nav class="tabsAdmin">
            <button class="CurrentAdmin" type="button" data-stepadmin="1">Reservación</button>
            <button type="button" data-stepadmin="2">Menú</button>
            <button type="button" data-stepadmin="3">Mesas</button>
        </nav>

        <div id="stepAdmin-1" class="seccionAdmin ShowAdmin">
            <h2>Reservaciones</h2>
            <p>Buscar Reservaciones</p>
            <input type="date" id="date" name="date" class="date" value="<?php echo $date ?>">

            <?php if (!empty($NoDate)) : ?>
                <h2><?php echo $NoDate; ?></h2>
            <?php else : ?>
                <h2>Reservaciones en esta fecha</h2>
                <div id="ReservationAdmin" class="ReservationAdmin">
                    <?php foreach ($reservaciones as $reserva) { ?>
                        <div class="CustomerReservationInformation">
                            <h1 class="CustomerReservation">Reservación de: <span class="Span"><?php echo $reserva['nombre'] ?? 'N/A'; ?></span></h1>
                            <p class="TableCustomer">Mesa: <span class="Span"><?php echo $reserva['descripcion'] ?? 'N/A'; ?></span></p>
                            <p class="EmailCustomer">Email: <span><?php echo $reserva['email'] ?? 'N/A'; ?></span></p>
                            <p>Reservación No: <span><?php echo $reserva['id'] ?? 'N/A'; ?></span></p>
                            <p>Fecha: <span><?php echo $reserva['fecha'] ?? 'N/A'; ?></span></p>
                            <p>Hora: <span><?php echo $reserva['hora'] ?? 'N/A'; ?></span></p>

                            <form action="/api/Delete" method="post">
                            <input type="hidden" name="id" value="<?php echo $reserva['id'] ?>">
                            <input type="submit" class="btDelete" id="btDelete" value="Reservación Finalizada">
                            </form>
                        </div> 
                    <?php } ?>
                </div> 
            <?php endif; ?>

        </div>

        <div id="stepAdmin-2" class="seccionAdmin">
            <h2>Editor Menú</h2>
            <p><span class="TextElectricBlue">Crear,</span><span class="TextMustard"> Editar</span> o <span class="TextCrimsonRed">Eliminar</span> </p>

            <a href="/CRUDMenu">
                <button class="EditorButton">IR AL EDITOR</button>
            </a>
        </div>

        <div id="stepAdmin-3" class="seccionAdmin">
            <h2>Editor de Mesas</h2>
            <p><span class="TextElectricBlue">Crear,</span><span class="TextMustard"> Editar</span> o <span class="TextCrimsonRed">Eliminar</span> </p>

            <a href="CRUDTable">
                <button class="EditorButton">IR AL EDITOR</button>
            </a>
        </div>
    </div>

    <script>
        let Admin = 1;

        document.addEventListener('DOMContentLoaded', function() {
            startappAdmin();
            SearchDate();

        });

        const startappAdmin = () => {
            AdminSection();
            tabsAdmin();
        }

        const AdminSection = () => {
            const AdminSecciones = document.querySelectorAll('.seccionAdmin');
            AdminSecciones.forEach(Adminseccion => {
                Adminseccion.classList.remove('ShowAdmin');
            });

            // Muestra la sección actual
            const AdminActual = document.querySelector(`#stepAdmin-${Admin}`);
            if (AdminActual) {
                AdminActual.classList.add('ShowAdmin');
            }

            // Remueve la clase 'CurrentAdmin' del botón actual y añade a la pestaña seleccionada
            const AdminFormer = document.querySelector('.CurrentAdmin');
            if (AdminFormer) {
                AdminFormer.classList.remove('CurrentAdmin');
            }

            // Selecciona el botón correspondiente a la pestaña actual
            const AdminButton = document.querySelector(`[data-stepadmin="${Admin}"]`);
            if (AdminButton) {
                AdminButton.classList.add('CurrentAdmin');
            }
        }

        const tabsAdmin = () => {
            const buttons = document.querySelectorAll('.tabsAdmin button');
            buttons.forEach(bt => {
                bt.addEventListener('click', function(e) {
                    Admin = parseInt(e.target.dataset.stepadmin); // Asegura que Admin tenga el valor correcto
                    AdminSection();
                });
            });
        }

        const SearchDate = () => {
            const dateInput = document.querySelector('#date')
            dateInput.addEventListener('input', function(e) {
                const dateSelect = e.target.value;

                window.location = `?date=${dateSelect}`
            })
        }
    </script>


    <?php include_once __DIR__ . "/../templates/FooterSecundario.php"; ?>

    <script src="/build/js/bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>