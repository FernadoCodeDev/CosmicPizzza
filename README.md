Acerca de Cosmic Pizza 🍕
Cosmic Pizza es un sistema web diseñado para gestionar de manera eficiente las reservas y el registro de clientes en una pizzería con alta demanda. El proyecto implementa una arquitectura Model View Controller (MVC) y está desarrollado con tecnologías modernas tanto en el frontend como en el backend. Además, incluye una API personalizada que permite crear la reservación del usuario y permitirle al administrador verla como eliminarla.

El proyecto se destaca por ser escalable y adaptable a otros negocios que requieren sistemas de reservas o citas previas, como cines, clínicas, restaurantes y agencias inmobiliarias.

Sistema de Reservas: 
Los clientes pueden registrarse, iniciar sesión y realizar reservas especificando mesa y fecha.

Gestión de Contenido: 
Incluye un sistema CRUD para que los administradores gestionen promociones y opciones del menú de forma dinámica como tambien conocer las reservación por fecha y los datos de la misma.

Diseño Responsive:
Interfaz adaptable a distintos dispositivos para garantizar una experiencia de usuario óptima.
Escalabilidad: Preparado para ser reutilizado en otros negocios con necesidades similares.


¡Por supuesto! Aquí tienes una versión más profesional y detallada del texto explicativo para tu proyecto Cosmic Pizza:

Acerca del Proyecto
Cosmic Pizza es un sistema web diseñado para gestionar de manera eficiente las reservas y el registro de clientes en una pizzería con alta demanda. El proyecto implementa una arquitectura Model View Controller (MVC) y está desarrollado con tecnologías modernas tanto en el frontend como en el backend. Además, incluye una API personalizada que permite a la empresa administrar todo el contenido dinámico de la aplicación, como promociones, sabores de pizza, complementos y postres.

El proyecto se destaca por ser escalable y adaptable a otros negocios que requieren sistemas de reservas o citas previas, como cines, clínicas, restaurantes y agencias inmobiliarias.

Características
Sistema de Reservas: Los clientes pueden registrarse, iniciar sesión y realizar reservas especificando mesa y fecha.
Gestión de Contenido: Incluye un sistema CRUD para que los administradores gestionen promociones y opciones del menú de forma dinámica.
Diseño Responsive: Interfaz adaptable a distintos dispositivos para garantizar una experiencia de usuario óptima.
Escalabilidad: Preparado para ser reutilizado en otros negocios con necesidades similares.

Funcionamiento:
En la carpeta public se encuentra todo el contenido accesible públicamente, incluido un directorio llamado Video, donde se alojan videos demostrativos que muestran el funcionamiento del sistema. Estos videos detallan funcionalidades como:

  1. Inicio de sesión y registro de clientes
  2. Funciones CRUD para administradores
  3. Gestión de reservas y opciones del menú
     
Puedes visualizar estos videos directamente desde la carpeta o descargarlos si clonas el repositorio.

Explicación Detallada del Sistema:
Para una explicación más técnica y detallada, el archivo Development.php, ubicado en /views/auth/, describe paso a paso cómo funciona Cosmic Pizza. 

Acerca de la API de Cosmic Pizza
La API implementada en Cosmic Pizza actúa como un puente entre la base de datos y las funcionalidades del frontend, proporcionando un acceso estructurado y seguro a los datos necesarios para el sistema de reservas.

Transformación de Datos a Formato JSON
La API toma los datos directamente desde la base de datos y los convierte a un formato JSON (JavaScript Object Notation) antes de enviarlos al frontend. Esta conversión es esencial por varias razones:

  1. Compatibilidad: JavaScript, que es el lenguaje utilizado en el frontend, trabaja de manera nativa con objetos JSON. Esto hace que la integración de los datos sea más sencilla y directa en el lado del cliente.
  2. Estandarización: JSON es un formato universalmente reconocido y ampliamente utilizado para el intercambio de datos. Esto garantiza que la API sea compatible no solo con el sistema actual, sino también con cualquier otro servicio que pudiera conectarse a ella en el futuro.
  3. Seguridad y Abstracción: Interactuar directamente con la base de datos desde el frontend es una mala práctica por motivos de seguridad. La API actúa como una capa intermedia que controla el acceso a los datos y evita posibles vulnerabilidades, como ataques de inyección SQL. Además, abstrae la complejidad de las consultas a la base de datos, presentando solo los datos necesarios al cliente.

Estructura de la API: 

El código que define el comportamiento de la API se encuentra en el archivo controllers/APIController.php. Este archivo incluye comentarios que explican el funcionamiento de los métodos y las operaciones realizadas. Desde aquí, se gestionan las solicitudes realizadas por el frontend para interactuar con la base de datos, procesar los datos y devolverlos en un formato útil.

Conexión con el Frontend: 
En el archivo src/js/app.js, la API se conecta al sistema mediante una variable llamada SelecTable. Este objeto actúa como un punto central de almacenamiento para los datos que son utilizados por el sistema de reservas. Contiene propiedades relevantes como id, fecha, hora, name y tables, que ayudan a estructurar y manejar la información de las reservas en el cliente.

Función Asincrónica para Consultar la API:

La interacción entre el frontend y la API se gestiona mediante una función asincrónica llamada consultarApi (ubicada desde la línea 194 hasta la línea 409 del archivo). Esta función realiza solicitudes a la API para obtener datos relacionados con el sistema de reservación.

Características principales de consultarApi:

  1. Asincronía: Utiliza async y await para manejar las operaciones de red, lo que asegura una experiencia fluida y sin bloqueos en el frontend.
  2. Manejo de Respuestas: Procesa las respuestas de la API, las convierte de JSON a objetos JavaScript y actualiza la interfaz de usuario en consecuencia.
  3. Control de Errores: Garantiza que los errores durante la consulta o el procesamiento sean manejados adecuadamente para evitar fallos en el sistema.

La API de Cosmic Pizza no solo facilita la comunicación entre la base de datos y el frontend, sino que también asegura que los datos se presenten de manera segura y compatible. La capa de abstracción ofrecida por la API protege la integridad del sistema mientras optimiza la integración de datos en el cliente, brindando una experiencia de usuario fluida y confiable.

NOTA IMPORTANTE:
Si clonas el repositorio el menú inicial aparecera vacío debido a que el archivo .env (que contiene las variables de entorno necesarias para conectarse a la base de datos) está excluido del repositorio mediante .gitignore. Esto se hace por motivos de seguridad. Sin este archivo, los datos dinámicos del menú no estarán disponibles tranquilo no son errores.

Si deseas utilizar Cosmic Pizza como base para tu propio proyecto MVC, solo necesitas clonar el repositorio, configurar tus propias variables de entorno y base de datos.
