Acerca de Cosmic Pizza 🍕
Cosmic Pizza es un sistema web diseñado para gestionar de manera eficiente las reservas y el registro de clientes en una pizzería con alta demanda. El proyecto implementa una arquitectura Model View Controller (MVC) y está desarrollado con tecnologías modernas tanto en el frontend como en el backend. Además, incluye una API personalizada que permite a la empresa administrar todo el contenido dinámico de la aplicación, como promociones, sabores de pizza, complementos y postres.

El proyecto se destaca por ser escalable y adaptable a otros negocios que requieren sistemas de reservas o citas previas, como cines, clínicas, restaurantes y agencias inmobiliarias.

Características
Sistema de Reservas: Los clientes pueden registrarse, iniciar sesión y realizar reservas especificando mesa y fecha.
Gestión de Contenido: Incluye un sistema CRUD para que los administradores gestionen promociones y opciones del menú de forma dinámica.
Diseño Responsive: Interfaz adaptable a distintos dispositivos para garantizar una experiencia de usuario óptima.
Escalabilidad: Preparado para ser reutilizado en otros negocios con necesidades similares.
Funcionamiento
Carpeta public
En la carpeta public se encuentra todo el contenido accesible públicamente, incluido un directorio llamado Video, donde se alojan videos demostrativos que muestran el funcionamiento del sistema. Estos videos detallan funcionalidades como:

Inicio de sesión y registro de clientes.
Funciones CRUD para administradores.
Gestión de reservas y opciones del menú.
Puedes visualizar estos videos directamente desde la carpeta o descargarlos si clonas el repositorio.

Explicación Detallada del Sistema
Para una explicación más técnica y detallada, el archivo Development.php, ubicado en /views/auth/, describe paso a paso cómo funciona Cosmic Pizza. 

Nota Importante
El menú inicial aparece vacío debido a que el archivo .env (que contiene las variables de entorno necesarias para conectarse a la base de datos) está excluido del repositorio mediante .gitignore. Esto se hace por motivos de seguridad. Sin este archivo, los datos dinámicos del menú no estarán disponibles.

Si deseas utilizar Cosmic Pizza como base para tu propio proyecto MVC Sientete libre de clnar el repositorio, solo necesitas configurar tus propias variables de entorno y base de datos.
