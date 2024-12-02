<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

<h1>Como funciona Cosmic Pizza</h1>

<section>

    <div class="Explanation">
        <h1>Registro de Usuario</h1>
        <div class="ExplanationText">
            <p>En este video se muestra cómo registrarse en nuestro sitio web, destacando los pasos necesarios para crear una cuenta. Al iniciar, te encuentras en la página principal. Desde allí, accedes a la página de registro, donde encontrarás tres campos obligatorios:</p>
            <ol>
                <li>Nombre de usuario</li>
                <li>Correo electrónico (Nota: Este sitio es un proyecto educativo, por lo que no se enviarán correos reales a los usuarios)</li>
                <li>Contraseña</li>
            </ol>

            <p>Después de completar estos campos y enviar la información, serás dirigido a una página de confirmación. En un entorno real, recibirías un correo de confirmación en tu bandeja de entrada (en este caso, simulamos este paso utilizando Mailtrap). Al acceder a este mensaje, encontrarás un botón de confirmación que, al hacer clic, te llevará a una nueva página donde se confirma que tu cuenta ha sido creada con éxito.</p>
            <p>En esta página de confirmación, aparece un botón "Iniciar Sesión", que te redirige al formulario correspondiente. Para iniciar sesión, deberás ingresar el correo electrónico y la contraseña proporcionados durante el registro. Si los datos son correctos y cumplen con las validaciones, serás llevado a la página principal, ya con tu cuenta activa.</p>
            <p>Este proceso refleja cómo funcionaría un sistema de registro y autenticación en un sitio real, aunque está diseñado exclusivamente para fines demostrativos.</p>

        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/User Registration.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Validaciones de Registro: Usuario ya Registrado</h1>
        <div class="ExplanationText">
            <p>En este video se explica cómo funciona el sistema de validaciones para evitar la creación de cuentas duplicadas en el sitio. Si un usuario ya registrado intenta crear una nueva cuenta utilizando el mismo correo electrónico, el sistema detectará esta situación y mostrará una alerta con el mensaje: "Usuario ya registrado".</p>
            <p>Por ejemplo, en el video se observa a un usuario llamado Mario, quien ya tiene una cuenta en el sistema pero ha olvidado este detalle. Al intentar registrarse nuevamente con el mismo correo electrónico, la alerta aparece de inmediato, indicando que no es posible continuar con el proceso de registro.</p>
            <p>Esta funcionalidad está diseñada para garantizar que cada correo electrónico se asocie únicamente a una cuenta, replicando el comportamiento de sistemas reales de registro de usuarios. Este enfoque también ayuda a prevenir confusiones y a mantener la integridad del sistema.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/Validate User.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Validaciones de Inicio de Sesión: Usuario No Encontrado o Contraseña Incorrecta</h1>
        <div class="ExplanationText">
            <p>En este video se detalla cómo el sistema valida la información ingresada por el usuario al intentar iniciar sesión y cómo maneja los errores comunes, como ingresar un correo o una contraseña incorrectos.</p>
            <p>El usuario, Mario, intenta acceder a su cuenta desde la página de inicio de sesión. Sin embargo, en el primer intento, escribe incorrectamente su correo electrónico. Como el sistema no encuentra un usuario asociado a ese correo, se muestra una alerta con el mensaje: "Usuario no encontrado".</p>
            <p>Posteriormente, Mario ingresa correctamente su correo pero comete un error al escribir su contraseña. En este caso, el sistema detecta que los datos no coinciden y muestra una alerta indicando: "Contraseña incorrecta".</p>
            <p>Estas validaciones son esenciales para asegurar la autenticidad de los intentos de inicio de sesión y replican el comportamiento de plataformas reales, proporcionando mensajes claros y específicos para guiar al usuario a corregir sus errores y acceder exitosamente.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/Validate Login.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Recuperación de Cuenta: Restablecimiento de Contraseña</h1>
        <div class="ExplanationText">
            <p>En este video se muestra cómo un usuario puede recuperar el acceso a su cuenta en caso de olvidar su contraseña.</p>
            <p>El usuario, Mario, accede al apartado de "Recuperar Contraseña" desde la página de inicio de sesión. Allí se le solicita que ingrese el correo electrónico asociado a su cuenta. Después de proporcionar su correo, el sistema muestra una alerta con el mensaje: "Revisa tu Email", indicando que se ha enviado un procedimiento para restablecer su contraseña.</p>
            <p>En un entorno real, Mario recibiría un correo en su bandeja de entrada con un enlace para restablecer la contraseña (simulado aquí mediante Mailtrap). Al hacer clic en el enlace, es redirigido a la página "Recuperar Password", donde se le solicita ingresar una nueva contraseña.</p>
            <p>Una vez que Mario crea su nueva contraseña, el sistema lo regresa automáticamente a la página de inicio de sesión. Desde allí, puede ingresar su correo y su nueva contraseña. Finalmente, logra iniciar sesión exitosamente en su cuenta.</p>
            <p>Este flujo simula un sistema real de recuperación de cuenta, asegurando un proceso intuitivo y seguro para los usuarios.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/Recover password.mp4" type="video/mp4">
            </video>
        </div>



        <h1>Reservación de Mesa en el Restaurante</h1>
        <div class="ExplanationText">
            <p>En este video se muestra cómo un usuario puede realizar una reservación en el sistema del restaurante, siguiendo un proceso intuitivo y organizado.</p>
            <p>Una vez que Mario accede a su cuenta, se dirige al apartado "Reservación" para crear su reserva. El primer paso es seleccionar una mesa, dependiendo de si desea ir solo o acompañado de amigos y familiares. El sistema también permite elegir el tipo de mesa deseada. Cuando Mario selecciona una mesa, esta cambia a un color celeste, indicando que ha sido elegida correctamente.</p>
            <p>A continuación, se solicitan los datos de la reservación. El nombre del usuario se agrega automáticamente, por lo que Mario solo debe completar los campos de:</p>
            <ol>
                <li>Fecha (Las reservaciones deben realizarse con al menos 2 días de anticipación)</li>
                <li>Hora (Debe estar entre las 9:00 a. m. y las 8:00 p. m.)</li>
            </ol>
            <p>Si Mario intenta ingresar una hora fuera del rango permitido, aparecerá una alerta indicando que no es válida. Una vez que selecciona una hora aceptada, el proceso avanza al tercer paso: Confirmar Reservación.</p>
            <p>En esta etapa, el sistema presenta un resumen con todos los datos ingresados para que Mario pueda revisarlos. Si todo es correcto, presiona el botón "Confirmar Reservación", y el sistema muestra una alerta confirmando que su reservación se ha realizado con éxito.</p>
            <p>Este sistema proporciona una experiencia sencilla y clara para gestionar reservaciones, replicando procesos reales utilizados en restaurantes modernos.</p>

            <h1>Adaptabilidad del Sistema de Reservaciones</h1>
            <p>Aunque en este caso el sistema está diseñado para gestionar reservaciones en un restaurante, su estructura es altamente versátil y puede adaptarse a otros servicios. Por ejemplo:</p>
            <ol>
                <li>Reservación en cines: Los usuarios podrían seleccionar su asiento, la película que desean ver, la fecha y la hora de la función.</li>
                <li>Citas en clínicas: Permite a los pacientes elegir el especialista, la fecha y la hora de su consulta médica.</li>
                <li>Citas inmobiliarias: Una persona interesada en una propiedad puede usar este sistema para agendar una visita, indicando la casa de su interés y el momento en que desea verla.</li>
            </ol>
            <p>Este diseño flexible asegura que el sistema pueda ser fácilmente adaptado para cumplir con las necesidades de diversos sectores.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/User Reservation.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Gestión de Reservaciones por el Administrador</h1>
        <div class="ExplanationText">
            <p>En este video, se muestra cómo el administrador puede gestionar las reservaciones a través de la página de administración, a la que solo él tiene acceso.</p>
            <p>La página cuenta con una barra de búsqueda que permite al administrador filtrar las reservaciones por fechas. Si no hay ninguna reservación para el día seleccionado, el sistema muestra el mensaje "No hay reservaciones en la fecha seleccionada".</p>
            <p>Si existen reservaciones para esa fecha, se muestran en una lista con los detalles correspondientes. En el caso del 30 de diciembre, se muestra la reservación de Mario, con la siguiente información:</p>
            <ol>
                <li>Nombre de la persona que hizo la reservación</li>
                <li>Mesa seleccionada</li>
                <li>Correo electrónico para contacto</li>
                <li>Número de la reservación</li>
                <li>Fecha y hora de la reservación</li>
            </ol>
            <p>unto a esta información, aparece un botón denominado "Reservación Finalizada". Al hacer clic en este botón, el sistema elimina la reservación, lo que indica que Mario ya ha sido atendido y su reservación queda obsoleta. Esto asegura que el administrador pueda llevar un control claro de las reservaciones completadas y aquellas pendientes.</p>
            <p>Este proceso permite una gestión eficiente y ordenada de las reservas en el sistema, ayudando al administrador a mantener todo actualizado y sin confusiones.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/Administrator View Reservations.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Gestión del Menú - CRUD (Create, Read, Update, Delete) de Productos</h1>
        <div class="ExplanationText">
            <p>En este video, el administrador accede a la sección de gestión del menú, donde puede ver los diferentes tipos de productos disponibles: Promociones, Pizzas, Complementos y Postres. Todos los productos están organizados por su tipo, facilitando la visualización y edición del menú.</p>
            <p>El administrador se entera de que ha llegado un nuevo sabor de pizza, por lo que decide agregarlo al menú. Para ello, accede al área "Crear Nuevo Producto". En esta sección, se le solicita subir una imagen del nuevo producto, seleccionar el tipo (en este caso, Pizza) y completar la información correspondiente, como el nombre del producto, una descripción y el precio.</p>
            <p>Una vez que todos los campos están completos, el administrador presiona el botón "Crear Producto". El sistema lo redirige nuevamente al menú del administrador, donde el nuevo producto aparece correctamente agregado bajo la categoría correspondiente, en este caso, como una Pizza.</p>
            <p>Este proceso permite al administrador mantener el menú actualizado, añadiendo, editando o eliminando productos de forma sencilla y eficiente.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/Administrator Create Menu.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Actualización de Producto en el Menú</h1>
        <div class="ExplanationText">
            <p>En este video, se muestra cómo el administrador puede corregir un error en los datos de un producto previamente agregado al menú.</p>
            <p>Al acceder al menú del administrador, el administrador nota que se ha equivocado al ingresar los datos de un producto, por lo que decide realizar una actualización. En la lista de productos, bajo cada uno, se encuentran dos botones: "Editar" y "Eliminar".</p>
            <p>El administrador presiona el botón "Editar" correspondiente al producto que desea corregir. Esto lo lleva a una nueva pantalla donde puede subir una nueva imagen, modificar el nombre, la descripción y el precio del producto.</p>
            <p>Una vez que realiza los cambios, presiona el botón "Actualizar Producto". El sistema lo redirige nuevamente al menú del administrador, donde puede ver el producto actualizado con los nuevos datos correctamente reflejados.</p>
            <p>Este proceso permite al administrador corregir y mantener los productos del menú con la información precisa y actualizada de manera rápida y eficiente.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/Admin Update Menu.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Eliminación de un Producto del Menú</h1>
        <div class="ExplanationText">
            <p>En este video, el administrador decide eliminar un producto del menú, específicamente una pizza de tiempo limitado que ha cumplido su período de disponibilidad.</p>
            <p>Para hacerlo, el administrador accede a la lista de productos en el menú del administrador, donde puede ver todos los productos disponibles. Junto a cada producto, se encuentran dos botones: "Editar" y "Eliminar".</p>
            <p>El administrador selecciona el botón "Eliminar" correspondiente a la pizza que desea retirar del menú. Al presionar este botón, el sistema elimina el producto de forma definitiva del menú, actualizando la lista para reflejar que la pizza ya no está disponible.</p>
            <p>Este proceso asegura que el administrador pueda gestionar de manera efectiva el menú, eliminando productos que ya no están en oferta o que han expirado.</p>

        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/Administrator delete Menu.mp4" type="video/mp4">
            </video>
        </div>

        <h1>Gestión de Mesas - CRUD</h1>
        <div class="ExplanationText">
            <p>En este video, se muestra cómo el administrador puede gestionar las mesas disponibles en el restaurante utilizando las funciones Crear, Actualizar y Eliminar.</p>
            <p><span>Crear una mesa</span> El administrador puede añadir nuevas mesas al sistema mediante el botón "Crear Nueva Mesa". Al presionar este botón, se le solicita al administrador ingresar los detalles de la mesa, como el nombre de la mesa (por ejemplo, mesa para 2, mesa familiar, etc.), su capacidad (número de personas que puede acomodar) y su ubicación en el restaurante. Tras ingresar todos los detalles, el administrador presiona el botón "Crear Mesa", y la nueva mesa es añadida a la lista de mesas disponibles.</p>
            <p><span>Actualizar una mesa</span> Si el administrador desea cambiar la información de una mesa previamente añadida, puede hacerlo al presionar el botón "Editar" junto a la mesa correspondiente. Esto lo llevará a una pantalla donde podrá modificar los detalles de la mesa, como el nombre, la capacidad o la ubicación. Después de realizar los cambios, el administrador presiona el botón "Actualizar Mesa", lo que actualizará la mesa con los nuevos datos.</p>
            <p><span>Eliminar una mesa</span> En caso de que una mesa ya no esté disponible o deba ser retirada, el administrador puede eliminarla presionando el botón "Eliminar" junto a la mesa correspondiente. Al confirmar la eliminación, la mesa será retirada del sistema y ya no aparecerá en la lista de mesas disponibles.</p>
            <p>Este proceso de CRUD de mesas permite al administrador gestionar de manera flexible y eficiente las mesas del restaurante, asegurando que la información se mantenga actualizada según sea necesario.</p>
        </div>

        <div class="ExplanationVideo">
            <video controls>
                <source src="/Video/CRUD admin table.mp4" type="video/mp4">
            </video>
        </div>


    </div>
</section>

<?php include_once __DIR__ . "/../templates/FooterSecundario.php" ?>

<script src="build/js/bundle.min.js"></script>

</body>


</html>