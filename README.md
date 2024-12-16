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

## Manejo de Errores Comunes

Después de instalar las dependencias con Composer (lo cual puede tardar unos 2 minutos; espera a que termine porque el archivo autoload.php es esencial para el funcionamiento del sistema), si intentas acceder al proyecto a través de localhost, podrías encontrarte con un error como este:

```bash
[::1]:56895 [500]: GET / - Uncaught mysqli_sql_exception: Access denied for user ''@'localhost' (using password: NO) in C:\includes\DataBase.php:3
Stack trace:
#0 C:\includes\DataBase.php(3): mysqli_connect()
#1 C:\includes\app.php(9): require('...')
#2 C:\public\index.php(4): require_once('...')
#3 {main}
  thrown in C:\includes\DataBase.php on line 3
```
Este error se debe a que el sistema intenta conectarse a una base de datos usando las variables de entorno definidas en el archivo .env, pero como este archivo está excluido del repositorio (por razones de seguridad), el sistema no puede encontrar esas credenciales. En concreto, la línea responsable de este problema es:

```bash
$db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
```
## Soluciones:

**Comentar el Código Temporalmente:** 
Si aún no tienes una base de datos configurada, puedes evitar este error comentando la línea que establece la conexión. Hazlo de la siguiente manera:

```bash
/*
$db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
todo el código
*/
```
**Comenta todo el código que sale en DataBase.php**

Si ya tienes una base de datos lista o planeas usar una, asegúrate de crear un archivo .env en el directorio raíz del proyecto y define las variables necesarias para la conexión, como en este ejemplo:

```bash
DB_HOST=localhost
DB_USER=tu_usuario
DB_PASS=tu_contraseña
DB_NAME=nombre_base_de_datos
```

Este error ocurre porque el sistema espera encontrar las credenciales en el archivo .env. Sin este archivo y sin la configuración adecuada, el sistema no puede establecer la conexión necesaria. Una vez que tengas configurada tu base de datos y el archivo **.env**, el proyecto debería ejecutarse sin problemas.

Una vez resuelto el primer problema, el siguiente que te aparecerá en la terminal será el siguiente:

```bash
[::1]:57116 [500]: GET / - Uncaught Error: Call to a member function query() on null in C:\models\ActiveRecord.php:42
Stack trace:
#0 C:\controllers\LoginController.php(239): Model\ActiveRecord::consultarSQL()
#1 [internal function]: Controllers\LoginController::inicio()
#2 C:\Router.php(35): call_user_func()
#3 C:\public\index.php(105): MVC\Router->comprobarRutas()        
#4 {main}
  thrown in C:\models\ActiveRecord.php on line 42
```
Este error ocurre porque el sistema intenta ejecutar una consulta SQL utilizando la base de datos, pero no puede acceder a ella porque la conexión no se ha establecido correctamente. Si nos dirigimos a la carpeta **models\ActiveRecord.php**, encontrarás el siguiente código:

```bash
// Consulta SQL para crear un objeto en Memoria
public static function consultarSQL($query)
{
    $resultado = self::$db->query($query);
    if ($resultado === false) {
        die("Error en la consulta: " . self::$db->error);
    }

    $array = [];
    while ($registro = $resultado->fetch_assoc()) {
        $array[] = static::crearObjeto($registro);
    }

    $resultado->free();
    return $array;
}
```

El problema radica en que self::$db no está definido, lo que provoca el error. Esto se debe a que no se ha establecido la conexión con la base de datos, lo cual es necesario para ejecutar consultas SQL.

**Solución temporal:** Si no has conectado tu base de datos aún, puedes comentar el código de la función consultarSQL usando /**/ de la siguiente forma, o simplemente conecta tu base de datos para que el sistema funcione correctamente.

El último error que te encontrarás al acceder a Cosmic Pizza es el siguiente:

```bash
[::1]:57251 [500]: GET / - Uncaught Error: Call to undefined method Model\Menu::consultarSQL() in C:\controllers\LoginController.php:239
Stack trace:
#0 [internal function]: Controllers\LoginController::inicio()
#1 C:\Router.php(35): call_user_func()
#2 C:\public\index.php(105): MVC\Router->comprobarRutas()        
#3 {main}
  thrown in C:\controllers\LoginController.php on line 239
```
Este error ocurre porque el controlador **LoginController** está intentando llamar al método **consultarSQL()** desde el modelo Menu, pero no se ha establecido una conexión con la base de datos, por lo que el método es considerado "indefinido".

La función 
```bash
consultarSQL() 
```
es utilizada para consultar los productos de la base de datos y mostrar el menú en la página principal. Sin embargo, como aún no se ha conectado a una base de datos, se produce este error.

**Solución temporal:** Para evitar este error y poder continuar trabajando en el proyecto sin la necesidad de tener la base de datos conectada, puedes comentar la siguiente línea de código en el archivo **LoginController.php**:

```bash
//$product = Menu::consultarSQL($consulta);
```
Con esto, el sistema no intentará realizar la consulta a la base de datos hasta que configures tu base de datos correctamente.

Luego, accede al sistema a través de **la URL dada desde la terminal de VSCODE** en tu navegador .

Una vez comentados esos 3 errores, deberías poder acceder a la página principal de Cosmic Pizza y a algunas otras páginas. Notarás que la terminal sigue mostrando errores; esto puede deberse a otras consultas o métodos que aún intentan interactuar con la base de datos. Sin embargo, podrás ver el proyecto sin problemas.

Los problemas adicionales pueden estar relacionados con otras consultas a la base de datos o con el registro e inicio de sesión, los cuales, al igual que la base de datos, se encuentran configurados en el archivo excluido .env. Para el registro, se está utilizando Mailtrap, así que asegúrate de configurarlo correctamente si necesitas probar el registro de usuarios.

Espero que con esta pequeña guía hayas podido visualizar el proyecto de Cosmic Pizza en tu entorno local y continuar con el desarrollo sin inconvenientes. 😊

Al seguir los pasos indicados, deberías poder ver el proyecto **Cosmic Pizza** funcionando.

Espero que esta información te haya sido útil. Siéntete libre de clonar este repositorio y adaptarlo a tu propio proyecto.

**programar no siempre es fácil, pero no solo creamos líneas de código, ¡creamos experiencias que pueden marcar la diferencia! 🚀**


