# **Acerca de Cosmic Pizza** 🍕

Cosmic Pizza es un sistema web diseñado para gestionar de manera eficiente las reservas y el registro de clientes en una pizzería con alta demanda. El proyecto implementa una arquitectura Model View Controller (MVC) y está desarrollado con tecnologías modernas tanto en el frontend como en el backend. Incluye una API personalizada que permite a los usuarios crear reservaciones y a los administradores visualizarlas o eliminarlas.

Este sistema se destaca por su escalabilidad y adaptabilidad, lo que lo hace adecuado para otros negocios que requieren sistemas de reservas o citas previas, como cines, clínicas, restaurantes y agencias inmobiliarias.

## Características Principales

**Sistema de Reservas:**
Los clientes pueden registrarse, iniciar sesión y realizar reservas especificando mesa y fecha.

**Gestión de Contenido:**
Los administradores tienen acceso a un sistema CRUD que permite gestionar promociones y opciones del menú como de las mesas de manera dinámica. También pueden consultar y administrar las reservas por fecha y visualizar los datos asociados.

**Diseño Responsive:**
La interfaz está diseñada para adaptarse a distintos dispositivos, garantizando una experiencia de usuario óptima en móviles, tablets y computadoras de escritorio.

**Escalabilidad:**
Cosmic Pizza está preparado para ser reutilizado en otros negocios con necesidades similares, gracias a su arquitectura modular y flexible.

## API de Cosmic Pizza
La API de Cosmic Pizza actúa como una capa intermedia entre el frontend y la base de datos, encargada de manejar las solicitudes relacionadas con el sistema de reservas de manera segura y eficiente.

**Funcionalidades de la API**
**Creación de Reservas:**
La API permite a los usuarios crear reservaciones especificando detalles como fecha, hora, nombre y mesa.

**Visualización de Reservas:**
Los administradores pueden acceder a las reservaciones realizadas a través del sistema.

**Eliminación de Reservas:**
Los administradores pueden eliminar reservaciones cuando sea necesario.

**Seguridad y Formato de Datos**
La API utiliza JSON (JavaScript Object Notation) como formato de intercambio de datos, asegurando compatibilidad con el frontend y otros sistemas. Este enfoque garantiza:

**Compatibilidad:** 
Integración nativa con JavaScript en el frontend.

**Estandarización:** 
Interoperabilidad con otros servicios.

**Seguridad:** Protege la base de datos al actuar como una capa de abstracción, evitando accesos directos desde el frontend.

## Funcionamiento del Sistema

**Videos Demostrativos:**
En la carpeta **public/video** se encuentran videos que muestran funcionalidades como:

1. Inicio de sesión y registro de clientes.
2. Gestión CRUD para administradores.
3. Proceso de reservación y manejo de contenido dinámico.

**Explicación:**
El archivo Development.php (ubicado en **views/auth/Development.php**) detalla el funcionamiento interno del sistema, incluyendo explicaciones técnicas sobre las diferentes partes del proyecto.

## Nota Importante
Si clonas el repositorio, el menú inicial aparecerá vacío porque el archivo .env (que contiene las variables de entorno necesarias para conectarse a la base de datos) está excluido del repositorio por motivos de seguridad. Esto significa que deberás configurar tu propia base de datos para que el sistema funcione correctamente.

Para utilizar Cosmic Pizza, asegúrate de:

**1. Configurar tus propias variables de entorno:**

Crea un archivo .env con las credenciales necesarias para conectar tu base de datos.
Esto incluye el nombre de la base de datos, el usuario, la contraseña y cualquier otra configuración específica.

**2. Conectar tu base de datos:**

Define la estructura de la base de datos siguiendo las especificaciones de este proyecto o crea la tuya propia adaptada a tus necesidades.

**Protección de Rutas**

En Cosmic Pizza, las rutas del administrador están protegidas para evitar accesos no autorizados. Esto significa que únicamente los usuarios con privilegios de administrador pueden acceder a ellas.

**¿Por qué proteger estas rutas?**

La protección de rutas es una medida de seguridad fundamental para evitar que usuarios malintencionados puedan realizar cambios no deseados en el sistema, como alterar el contenido del menú, gestionar reservas o acceder a datos sensibles.

Si decides desactivar esta protección para tu proyecto, simplemente comenta la función

```bash
isAdmin();
```
en las rutas correspondientes. Esta función verifica si el usuario tiene privilegios de administrador antes de permitirle acceder.

**Registro y Sesión de Usuarios**

El registro y el inicio de sesión de usuarios también están protegidos mediante las configuraciones en el archivo .env. Esto garantiza que las credenciales de los usuarios se manejen de manera segura.

Para registrar usuarios en tu entorno local, utiliza un servicio como Mailtrap o cualquier otra solución similar para el envío y la validación de correos electrónicos. Esto te permitirá simular el proceso de registro y verificar que el sistema funciona correctamente.

**Ejecución en Local**

Recuerda que este proyecto utiliza la arquitectura MVC y debe ejecutarse en un entorno local de manera específica:

1. Navega a la carpeta public:
```bash
cd public
```
2. Inicia el servidor local utilizando el siguiente comando:
```bash
php -S localhost:3000
```
3. **Recuerda instalar la carpeta de composer**
```bash
composer install
```

Luego, accede al sistema a través de **la URL dada desde la terminal de VSCODE** en tu navegador.

Al seguir los pasos indicados, deberías poder ver el proyecto **Cosmic Pizza** funcionando.

Espero que esta información te haya sido útil. Siéntete libre de clonar este repositorio y adaptarlo a tu propio proyecto.

**programar no siempre es fácil, pero no solo creamos líneas de código, ¡creamos experiencias que pueden marcar la diferencia! 🚀**


